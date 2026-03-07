<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDivisionRequest;
use App\Models\division;
use App\Models\Division as ModelsDivision;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions = Division::all();
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
        $division = Division::create($request->validated());
        return $this->success($division, 'Divisi baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ModelsDivision $division)
    {
        return $this->success($division, 'Detail divisi ditemukan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDivisionRequest $request, ModelsDivision $division)
    {
        $this->authorize('update', $division);
        $division->update($request->all());
        return $this->success($division, 'Data divisi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsDivision $division)
    {
        $this->authorize('delete', $division);
        $division->delete();
        return $this->success(null, 'Divisi berhasil dihapus (Soft Delete)');
    }
}
