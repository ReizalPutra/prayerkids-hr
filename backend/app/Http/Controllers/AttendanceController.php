<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendanceRequest;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Attendance::class);
        $attendances = Attendance::with(['employee', 'shift', 'location'])->get();
        return $this->success($attendances, 'Data kehadiran berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRequest $request)
    {
        $this->authorize('create', Attendance::class);
        $attendance = Attendance::create($request->validated());
        return $this->success($attendance->load(['employee', 'shift', 'location']), 'Data kehadiran baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        $this->authorize('view', $attendance);
        return $this->success($attendance->load(['employee', 'shift', 'location']), 'Detail kehadiran ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAttendanceRequest $request, Attendance $attendance)
    {
        $this->authorize('update', $attendance);
        $attendance->update($request->validated());
        $attendance->refresh();
        return $this->success($attendance->load(['employee', 'shift', 'location']), 'Data kehadiran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $this->authorize('delete', $attendance);
        $attendance->delete();
        return $this->success(null, 'Data kehadiran berhasil dihapus');
    }
}
