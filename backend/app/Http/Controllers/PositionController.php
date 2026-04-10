<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Models\Position;
use App\Contracts\Services\PositionServiceInterface;

class PositionController extends Controller
{
    public function __construct(private readonly PositionServiceInterface $positionService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = $this->positionService->getAll();
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
        $position = $this->positionService->create($request->validated());
        return $this->success($position, 'Jabatan baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        return $this->success($this->positionService->show($position), 'Detail jabatan ditemukan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePositionRequest $request, Position $position)
    {
        $this->authorize('update', $position);
        $updatedPosition = $this->positionService->update($position, $request->validated());
        return $this->success($updatedPosition, 'Data jabatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        $this->authorize('delete', $position);
        $this->positionService->delete($position);
        return $this->success(null, 'Jabatan berhasil dihapus (Soft Delete)');
    }
}
