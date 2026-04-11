<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeaveRequestRequest;
use App\Models\LeaveRequest;
use App\Contracts\Services\LeaveRequestServiceInterface;

/**
 * @group HR Management - Leave Requests
 * API pengelolaan pengajuan cuti.
 *
 * @response 401 {"meta":{"code":401,"status":"error","message":"Unauthenticated."},"errors":null}
 * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
 * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
 */
class LeaveRequestController extends Controller
{
    public function __construct(private readonly LeaveRequestServiceInterface $leaveRequestService) {}

    /**
     * Display a listing of the resource.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Data cuti berhasil diambil"},"data":[{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef60","employee_id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9","type":"annual","status":"pending"}]}
     */
    public function index()
    {
        $this->authorize('viewAny', LeaveRequest::class);
        $leaves = $this->leaveRequestService->getAll();
        return $this->success($leaves, 'Data cuti berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
        *
        * @response 201 {"meta":{"status":"success","code":201,"message":"Pengajuan cuti baru berhasil ditambahkan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef60","employee_id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9","type":"annual","status":"pending"}}
     */
    public function store(StoreLeaveRequestRequest $request)
    {
        $this->authorize('create', LeaveRequest::class);
        $leave = $this->leaveRequestService->create($request->validated());
        return $this->success($leave, 'Pengajuan cuti baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Detail cuti ditemukan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef60","type":"annual","status":"pending"}}
          * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
          * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function show(LeaveRequest $leaveRequest)
    {
        $this->authorize('view', $leaveRequest);
        return $this->success($this->leaveRequestService->show($leaveRequest), 'Detail cuti ditemukan');
    }

    /**
     * Update the specified resource in storage.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Data cuti berhasil diperbarui"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef60","status":"approved"}}
          * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
          * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function update(StoreLeaveRequestRequest $request, LeaveRequest $leaveRequest)
    {
        $this->authorize('update', $leaveRequest);
        $updatedLeave = $this->leaveRequestService->update($leaveRequest, $request->validated());
        return $this->success($updatedLeave, 'Data cuti berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Data cuti berhasil dihapus"},"data":null}
          * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
          * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function destroy(LeaveRequest $leaveRequest)
    {
        $this->authorize('delete', $leaveRequest);
        $this->leaveRequestService->delete($leaveRequest);
        return $this->success(null, 'Data cuti berhasil dihapus');
    }
}
