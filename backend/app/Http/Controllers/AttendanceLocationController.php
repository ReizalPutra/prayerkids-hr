<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocationRequest;
use App\Models\AttendanceLocation;
use Illuminate\Http\Request;

class AttendanceLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = AttendanceLocation::all();
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
     */
    public function store(StoreLocationRequest $request)
    {
        $this->authorize('create', AttendanceLocation::class);
        $location = AttendanceLocation::create($request->validated());
        return $this->success($location, 'Lokasi baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(AttendanceLocation $attendanceLocation)
    {
        $this->authorize('view', $attendanceLocation);
        return $this->success($attendanceLocation, 'Detail lokasi ditemukan');
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
     */
    public function update(StoreLocationRequest $request, AttendanceLocation $attendanceLocation)
    {
        $this->authorize('update', $attendanceLocation);
        $attendanceLocation->update($request->validated());
        $attendanceLocation->refresh();
        return $this->success($attendanceLocation, 'Data lokasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceLocation $attendanceLocation)
    {
        $this->authorize('delete', $attendanceLocation);
        $attendanceLocation->delete();
        $attendanceLocation->refresh();
        return $this->success($attendanceLocation, 'Lokasi berhasil dihapus (Soft Delete)');
    }
}
