<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendanceRequest;
use App\Models\Attendance;
use App\Contracts\Services\AttendanceServiceInterface;

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
}
