<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShiftRequest;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shifts = Shift::all();
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
        $shift = Shift::create($request->validated());
        return $this->success($shift, 'Shift baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Shift $shift)
    {
        $this->authorize('view', $shift);
        return $this->success($shift, 'Detail shift ditemukan');
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
        $shift->update($request->validated());
        $shift->refresh();
        return $this->success($shift, 'Data shift berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $shift)
    {
        $this->authorize('delete', $shift);
        $shift->delete();
        $shift->refresh();
        return $this->success($shift, 'Shift berhasil dihapus (Soft Delete)');
    }
}
