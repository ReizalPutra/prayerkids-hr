<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeaveRequestRequest;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', LeaveRequest::class);
        $leaves = LeaveRequest::with(['employee'])->get();
        return $this->success($leaves, 'Data cuti berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeaveRequestRequest $request)
    {
        $this->authorize('create', LeaveRequest::class);
        $leave = LeaveRequest::create($request->validated());
        return $this->success($leave->load(['employee']), 'Pengajuan cuti baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(LeaveRequest $leaveRequest)
    {
        $this->authorize('view', $leaveRequest);
        return $this->success($leaveRequest->load(['employee']), 'Detail cuti ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreLeaveRequestRequest $request, LeaveRequest $leaveRequest)
    {
        $this->authorize('update', $leaveRequest);
        $leaveRequest->update($request->validated());
        $leaveRequest->refresh();
        return $this->success($leaveRequest->load(['employee']), 'Data cuti berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaveRequest $leaveRequest)
    {
        $this->authorize('delete', $leaveRequest);
        $leaveRequest->delete();
        return $this->success(null, 'Data cuti berhasil dihapus');
    }
}
