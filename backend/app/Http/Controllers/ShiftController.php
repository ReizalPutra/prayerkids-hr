<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShiftRequest;
use App\Models\Shift;
use App\Contracts\Services\ShiftServiceInterface;

/**
 * @group Operational - Shifts
 * API pengelolaan data shift kerja.
 *
 * @response 401 {"meta":{"code":401,"status":"error","message":"Unauthenticated."},"errors":null}
 * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
 * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
 */
class ShiftController extends Controller
{
    public function __construct(private readonly ShiftServiceInterface $shiftService) {}

    /**
     * Display a listing of the resource.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Data shift berhasil diambil"},"data":[{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef20","name":"Pagi","start_time":"08:00:00","end_time":"17:00:00"}]}
     */
    public function index()
    {
        $this->authorize('viewAny', Shift::class);
        $shifts = $this->shiftService->getAll();
        return $this->success($shifts, 'Data shift berhasil diambil');
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
     * @response 201 {"meta":{"status":"success","code":201,"message":"Shift baru berhasil ditambahkan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef20","name":"Pagi","start_time":"08:00:00","end_time":"17:00:00"}}
     * @response 422 {"meta":{"code":422,"status":"error","message":"Validasi request gagal."},"errors":{"name":["The name has already been taken."]}}
     */
    public function store(StoreShiftRequest $request)
    {
        $this->authorize('create', Shift::class);
        $shift = $this->shiftService->create($request->validated());
        return $this->success($shift, 'Shift baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Detail shift ditemukan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef20","name":"Pagi","start_time":"08:00:00","end_time":"17:00:00"}}
     * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
     * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function show(Shift $shift)
    {
        $this->authorize('view', $shift);
        return $this->success($this->shiftService->show($shift), 'Detail shift ditemukan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $shift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Data shift berhasil diperbarui"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef20","name":"Pagi (Updated)","start_time":"08:30:00","end_time":"17:30:00"}}
     * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
     * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function update(StoreShiftRequest $request, Shift $shift)
    {
        $this->authorize('update', $shift);
        $updatedShift = $this->shiftService->update($shift, $request->validated());
        return $this->success($updatedShift, 'Data shift berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Shift berhasil dihapus (Soft Delete)"},"data":null}
     * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
     * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function destroy(Shift $shift)
    {
        $this->authorize('delete', $shift);
        $deletedShift = $this->shiftService->delete($shift);
        return $this->success($deletedShift, 'Shift berhasil dihapus (Soft Delete)');
    }
}
