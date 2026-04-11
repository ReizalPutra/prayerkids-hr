<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Models\Position;
use App\Contracts\Services\PositionServiceInterface;

/**
 * @group Operational - Positions
 * API pengelolaan data jabatan.
 *
 * @response 401 {"meta":{"code":401,"status":"error","message":"Unauthenticated."},"errors":null}
 * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
 * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
 */
class PositionController extends Controller
{
    public function __construct(private readonly PositionServiceInterface $positionService) {}

    /**
     * Display a listing of the resource.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Data jabatan berhasil diambil"},"data":[{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef11","title":"HR Officer","base_salary":5500000}]}
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
        *
        * @response 201 {"meta":{"status":"success","code":201,"message":"Jabatan baru berhasil ditambahkan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef11","title":"HR Officer","base_salary":5500000}}
        * @response 422 {"meta":{"code":422,"status":"error","message":"Validasi request gagal."},"errors":{"title":["The title has already been taken."]}}
     */
    public function store(StorePositionRequest $request)
    {
        $this->authorize('create', Position::class);
        $position = $this->positionService->create($request->validated());
        return $this->success($position, 'Jabatan baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Detail jabatan ditemukan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef11","title":"HR Officer","base_salary":5500000}}
        * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
        * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
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
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Data jabatan berhasil diperbarui"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef11","title":"Senior HR Officer","base_salary":6500000}}
        * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
        * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function update(StorePositionRequest $request, Position $position)
    {
        $this->authorize('update', $position);
        $updatedPosition = $this->positionService->update($position, $request->validated());
        return $this->success($updatedPosition, 'Data jabatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Jabatan berhasil dihapus (Soft Delete)"},"data":null}
        * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
        * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function destroy(Position $position)
    {
        $this->authorize('delete', $position);
        $this->positionService->delete($position);
        return $this->success(null, 'Jabatan berhasil dihapus (Soft Delete)');
    }
}
