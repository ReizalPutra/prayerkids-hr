<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendanceRequest;
use App\Models\Attendance;
use App\Contracts\Services\AttendanceServiceInterface;

class AttendanceController extends Controller
{
    public function __construct(private readonly AttendanceServiceInterface $attendanceService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Attendance::class);
        $attendances = $this->attendanceService->getAll();
        return $this->success($attendances, 'Data kehadiran berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRequest $request)
    {
        $this->authorize('create', Attendance::class);
        $attendance = $this->attendanceService->create($request->validated());
        return $this->success($attendance, 'Data kehadiran baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        $this->authorize('view', $attendance);
        return $this->success($this->attendanceService->show($attendance), 'Detail kehadiran ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAttendanceRequest $request, Attendance $attendance)
    {
        $this->authorize('update', $attendance);
        $updatedAttendance = $this->attendanceService->update($attendance, $request->validated());
        return $this->success($updatedAttendance, 'Data kehadiran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $this->authorize('delete', $attendance);
        $this->attendanceService->delete($attendance);
        return $this->success(null, 'Data kehadiran berhasil dihapus');
    }
}
