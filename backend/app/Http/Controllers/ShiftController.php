<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShiftRequest;
use App\Models\Shift;
use App\Contracts\Services\ShiftServiceInterface;

class ShiftController extends Controller
{
    public function __construct(private readonly ShiftServiceInterface $shiftService) {}

    /**
     * Display a listing of the resource.
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
     */
    public function store(StoreShiftRequest $request)
    {
        $this->authorize('create', Shift::class);
        $shift = $this->shiftService->create($request->validated());
        return $this->success($shift, 'Shift baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
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
     */
    public function update(StoreShiftRequest $request, Shift $shift)
    {
        $this->authorize('update', $shift);
        $updatedShift = $this->shiftService->update($shift, $request->validated());
        return $this->success($updatedShift, 'Data shift berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $shift)
    {
        $this->authorize('delete', $shift);
        $deletedShift = $this->shiftService->delete($shift);
        return $this->success($deletedShift, 'Shift berhasil dihapus (Soft Delete)');
    }
}
