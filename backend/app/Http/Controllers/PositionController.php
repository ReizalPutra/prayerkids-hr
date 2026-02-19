<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Models\position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::all();
        return $this->success($positions, 'Data jabatan berhasil diambil');
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
    public function store(StorePositionRequest $request)
    {
        $this->authorize('create', Position::class);
        $position = Position::create($request->validated());
        return $this->success($position, 'Jabatan baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(position $position)
    {
        return $this->success($position, 'Detail jabatan ditemukan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePositionRequest $request, position $position)
    {
        $this->authorize('update', $position);
        $position->update($request->all());
        return $this->success($position, 'Data jabatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(position $position)
    {
        $this->authorize('delete', $position);
        $position->delete();
        return $this->success(null, 'Jabatan berhasil dihapus (Soft Delete)');
    }
}
