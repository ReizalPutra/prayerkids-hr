<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeaveRequestRequest;
use App\Models\LeaveRequest;
use App\Contracts\Services\LeaveRequestServiceInterface;

class LeaveRequestController extends Controller
{
    public function __construct(private readonly LeaveRequestServiceInterface $leaveRequestService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', LeaveRequest::class);
        $leaves = $this->leaveRequestService->getAll();
        return $this->success($leaves, 'Data cuti berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeaveRequestRequest $request)
    {
        $this->authorize('create', LeaveRequest::class);
        $leave = $this->leaveRequestService->create($request->validated());
        return $this->success($leave, 'Pengajuan cuti baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(LeaveRequest $leaveRequest)
    {
        $this->authorize('view', $leaveRequest);
        return $this->success($this->leaveRequestService->show($leaveRequest), 'Detail cuti ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreLeaveRequestRequest $request, LeaveRequest $leaveRequest)
    {
        $this->authorize('update', $leaveRequest);
        $updatedLeave = $this->leaveRequestService->update($leaveRequest, $request->validated());
        return $this->success($updatedLeave, 'Data cuti berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaveRequest $leaveRequest)
    {
        $this->authorize('delete', $leaveRequest);
        $this->leaveRequestService->delete($leaveRequest);
        return $this->success(null, 'Data cuti berhasil dihapus');
    }
}
