<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocationRequest;
use App\Models\AttendanceLocation;
use App\Contracts\Services\AttendanceLocationServiceInterface;

class AttendanceLocationController extends Controller
{
    public function __construct(private readonly AttendanceLocationServiceInterface $attendanceLocationService) {}

    /**
     * Display a listing of the resource.
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
     */
    public function store(StoreLocationRequest $request)
    {
        $this->authorize('create', AttendanceLocation::class);
        $location = $this->attendanceLocationService->create($request->validated());
        return $this->success($location, 'Lokasi baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
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
     */
    public function update(StoreLocationRequest $request, AttendanceLocation $attendanceLocation)
    {
        $this->authorize('update', $attendanceLocation);
        $updatedLocation = $this->attendanceLocationService->update($attendanceLocation, $request->validated());
        return $this->success($updatedLocation, 'Data lokasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceLocation $attendanceLocation)
    {
        $this->authorize('delete', $attendanceLocation);
        $deletedLocation = $this->attendanceLocationService->delete($attendanceLocation);
        return $this->success($deletedLocation, 'Lokasi berhasil dihapus (Soft Delete)');
    }
}
