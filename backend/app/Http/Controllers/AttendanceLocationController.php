<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocationRequest;
use App\Models\AttendanceLocation;
use App\Contracts\Services\AttendanceLocationServiceInterface;
use Illuminate\Support\Str;

/**
 * @group Operational - Attendance Locations
 * API pengelolaan lokasi presensi (geo-fencing).
 *
 * @response 401 {"meta":{"code":401,"status":"error","message":"Unauthenticated."},"errors":null}
 * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
 * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
 */
class AttendanceLocationController extends Controller
{
    public function __construct(private readonly AttendanceLocationServiceInterface $attendanceLocationService) {}

    /**
     * Display a listing of the resource.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Data lokasi berhasil diambil"},"data":[{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef30","name":"Kantor Pusat","latitude":-6.2009,"longitude":106.8166,"radius_meter":100}]}
     */
    public function index()
    {
        $this->authorize('viewAny', AttendanceLocation::class);
        $locations = $this->attendanceLocationService->getAll();
        return $this->success($locations, 'Data lokasi berhasil diambil');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @response 201 {"meta":{"status":"success","code":201,"message":"Lokasi baru berhasil ditambahkan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef30","name":"Kantor Pusat","latitude":-6.2009,"longitude":106.8166,"radius_meter":100}}
     */
    public function store(StoreLocationRequest $request)
    {
        $this->authorize('create', AttendanceLocation::class);
        $validated = $request->validated();

        if (empty($validated['qr_token'])) {
            $validated['qr_token'] = $this->generateUniqueQrToken();
        }

        $location = $this->attendanceLocationService->create($validated);
        return $this->success($location, 'Lokasi baru berhasil ditambahkan', 201);
    }

    /**
     * Get stable QR payload for an attendance location.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"QR lokasi berhasil diambil"},"data":{"location_id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef30","name":"Kantor Pusat","qr_token":"LOC-HQ-QR-001","qr_payload":"PKHR::ATTENDANCE_LOCATION::LOC-HQ-QR-001"}}
     */
    public function qr(AttendanceLocation $attendanceLocation)
    {
        $this->authorize('view', $attendanceLocation);

        if (!$attendanceLocation->qr_token) {
            $attendanceLocation->update([
                'qr_token' => $this->generateUniqueQrToken(),
            ]);
        }

        return $this->success([
            'location_id' => $attendanceLocation->id,
            'name' => $attendanceLocation->name,
            'is_active' => (bool) $attendanceLocation->is_active,
            'qr_token' => $attendanceLocation->qr_token,
            'qr_payload' => sprintf('PKHR::ATTENDANCE_LOCATION::%s', $attendanceLocation->qr_token),
        ], 'QR lokasi berhasil diambil');
    }

    /**
     * Display the specified resource.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Detail lokasi ditemukan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef30","name":"Kantor Pusat","latitude":-6.2009,"longitude":106.8166,"radius_meter":100}}
     * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
     * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function show(AttendanceLocation $attendanceLocation)
    {
        $this->authorize('view', $attendanceLocation);
        return $this->success($this->attendanceLocationService->show($attendanceLocation), 'Detail lokasi ditemukan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttendanceLocation $attendanceLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Data lokasi berhasil diperbarui"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef30","name":"Kantor Cabang","latitude":-6.2101,"longitude":106.8202,"radius_meter":120}}
     * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
     * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function update(StoreLocationRequest $request, AttendanceLocation $attendanceLocation)
    {
        $this->authorize('update', $attendanceLocation);
        $updatedLocation = $this->attendanceLocationService->update($attendanceLocation, $request->validated());
        return $this->success($updatedLocation, 'Data lokasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Lokasi berhasil dihapus (Soft Delete)"},"data":null}
     * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
     * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function destroy(AttendanceLocation $attendanceLocation)
    {
        $this->authorize('delete', $attendanceLocation);
        $deletedLocation = $this->attendanceLocationService->delete($attendanceLocation);
        return $this->success($deletedLocation, 'Lokasi berhasil dihapus (Soft Delete)');
    }

    private function generateUniqueQrToken(): string
    {
        do {
            $token = 'LOC-' . Str::upper(Str::random(12));
        } while (AttendanceLocation::query()->where('qr_token', $token)->exists());

        return $token;
    }
}
