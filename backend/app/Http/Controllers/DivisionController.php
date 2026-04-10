<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDivisionRequest;
use App\Models\Division;
use App\Contracts\Services\DivisionServiceInterface;

class DivisionController extends Controller
{
    public function __construct(private readonly DivisionServiceInterface $divisionService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions = $this->divisionService->getAll();
        return $this->success($divisions, 'Data divisi berhasil diambil');
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
    public function store(StoreDivisionRequest $request)
    {
        $this->authorize('create', Division::class);
        $division = $this->divisionService->create($request->validated());
        return $this->success($division, 'Divisi baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $division)
    {
        $this->authorize('view', $division);
        return $this->success($this->divisionService->show($division), 'Detail divisi ditemukan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDivisionRequest $request, Division $division)
    {
        $this->authorize('update', $division);
        $updatedDivision = $this->divisionService->update($division, $request->validated());
        return $this->success($updatedDivision, 'Data divisi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        $this->authorize('delete', $division);
        $this->divisionService->delete($division);
        return $this->success(null, 'Divisi berhasil dihapus (Soft Delete)');
    }
}
