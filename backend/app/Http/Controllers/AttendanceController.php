<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScanAttendanceQrRequest;
use App\Http\Requests\StoreAttendanceRequest;
use App\Models\Attendance;
use App\Models\AttendanceLocation;
use App\Models\Employee;
use App\Models\Shift;
use App\Contracts\Services\AttendanceServiceInterface;
use Carbon\Carbon;

/**
 * @group HR Management - Attendances
 * API pengelolaan data presensi karyawan.
 *
 * @response 401 {"meta":{"code":401,"status":"error","message":"Unauthenticated."},"errors":null}
 * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
 * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
 */
class AttendanceController extends Controller
{
    public function __construct(private readonly AttendanceServiceInterface $attendanceService) {}

    /**
     * Display a listing of the resource.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Data kehadiran berhasil diambil"},"data":[{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef50","employee_id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9","date":"2026-04-11","status":"on_time"}]}
     */
    public function index()
    {
        $this->authorize('viewAny', Attendance::class);
        $attendances = $this->attendanceService->getAll();
        return $this->success($attendances, 'Data kehadiran berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @response 201 {"meta":{"status":"success","code":201,"message":"Data kehadiran baru berhasil ditambahkan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef50","employee_id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9","date":"2026-04-11","status":"on_time"}}
     */
    public function store(StoreAttendanceRequest $request)
    {
        $this->authorize('create', Attendance::class);
        $attendance = $this->attendanceService->create($request->validated());
        return $this->success($attendance, 'Data kehadiran baru berhasil ditambahkan', 201);
    }

    /**
     * Scan static QR token and auto-create attendance.
     *
     * @response 201 {"meta":{"status":"success","code":201,"message":"Presensi berhasil direkam dari scan QR"},"data":{"status":"on_time","late_minutes":0}}
     * @response 409 {"meta":{"status":"error","code":409,"message":"Anda sudah melakukan presensi hari ini."},"errors":null}
     * @response 422 {"meta":{"status":"error","code":422,"message":"Posisi Anda di luar radius lokasi presensi."},"errors":{"distance_meter":154.2,"allowed_radius_meter":100}}
     */
    public function scanQr(ScanAttendanceQrRequest $request)
    {
        $this->authorize('create', Attendance::class);

        $user = $request->user();

        $employee = Employee::query()
            ->where('user_id', $user->id)
            ->where('status', 'active')
            ->first();

        if (!$employee) {
            return $this->error('Akun ini tidak terhubung ke karyawan aktif.', 422);
        }

        $location = AttendanceLocation::query()
            ->where('qr_token', $request->string('qr_token')->toString())
            ->where('is_active', true)
            ->first();

        if (!$location) {
            return $this->error('QR lokasi tidak valid atau lokasi sedang nonaktif.', 404);
        }

        $shift = Shift::query()->find($request->string('shift_id')->toString());

        if (!$shift) {
            return $this->error('Shift tidak ditemukan.', 422);
        }

        $scanTime = $request->filled('scanned_at')
            ? Carbon::createFromFormat('Y-m-d H:i:s', $request->string('scanned_at')->toString())
            : now();

        $distanceMeter = $this->haversineDistance(
            (float) $request->input('check_in_lat'),
            (float) $request->input('check_in_long'),
            (float) $location->latitude,
            (float) $location->longitude,
        );

        if ($distanceMeter > (float) $location->radius_meter) {
            return $this->error('Posisi Anda di luar radius lokasi presensi.', 422, [
                'distance_meter' => round($distanceMeter, 2),
                'allowed_radius_meter' => (int) $location->radius_meter,
            ]);
        }

        $alreadyCheckedIn = Attendance::query()
            ->where('employee_id', $employee->id)
            ->whereDate('date', $scanTime->toDateString())
            ->exists();

        if ($alreadyCheckedIn) {
            return $this->error('Anda sudah melakukan presensi hari ini.', 409);
        }

        $shiftStart = Carbon::createFromFormat(
            'Y-m-d H:i:s',
            sprintf('%s %s', $scanTime->toDateString(), $shift->start_time),
        );

        $lateMinutes = $scanTime->greaterThan($shiftStart)
            ? $shiftStart->diffInMinutes($scanTime)
            : 0;

        $attendance = $this->attendanceService->create([
            'employee_id' => $employee->id,
            'shift_id' => $shift->id,
            'location_id' => $location->id,
            'date' => $scanTime->toDateString(),
            'clock_in' => $scanTime->format('Y-m-d H:i:s'),
            'status' => $lateMinutes > 0 ? 'late' : 'on_time',
            'late_minutes' => $lateMinutes,
            'check_in_lat' => (float) $request->input('check_in_lat'),
            'check_in_long' => (float) $request->input('check_in_long'),
        ]);

        return $this->success($attendance, 'Presensi berhasil direkam dari scan QR', 201);
    }

    /**
     * Display the specified resource.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Detail kehadiran ditemukan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef50","employee_id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9","date":"2026-04-11","status":"on_time"}}
     * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
     * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function show(Attendance $attendance)
    {
        $this->authorize('view', $attendance);
        return $this->success($this->attendanceService->show($attendance), 'Detail kehadiran ditemukan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Data kehadiran berhasil diperbarui"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef50","status":"late"}}
     * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
     * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function update(StoreAttendanceRequest $request, Attendance $attendance)
    {
        $this->authorize('update', $attendance);
        $updatedAttendance = $this->attendanceService->update($attendance, $request->validated());
        return $this->success($updatedAttendance, 'Data kehadiran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Data kehadiran berhasil dihapus"},"data":null}
     * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
     * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function destroy(Attendance $attendance)
    {
        $this->authorize('delete', $attendance);
        $this->attendanceService->delete($attendance);
        return $this->success(null, 'Data kehadiran berhasil dihapus');
    }

    private function haversineDistance(
        float $latitude1,
        float $longitude1,
        float $latitude2,
        float $longitude2,
    ): float {
        $earthRadiusMeter = 6371000;

        $latFrom = deg2rad($latitude1);
        $lonFrom = deg2rad($longitude1);
        $latTo = deg2rad($latitude2);
        $lonTo = deg2rad($longitude2);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(
            pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)
        ));

        return $angle * $earthRadiusMeter;
    }
}
