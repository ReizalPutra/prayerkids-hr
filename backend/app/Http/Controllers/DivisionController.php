<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDivisionRequest;
use App\Models\Division;
use App\Contracts\Services\DivisionServiceInterface;

/**
 * @group Operational - Divisions
 * API pengelolaan data divisi.
 *
 * @response 401 {"meta":{"code":401,"status":"error","message":"Unauthenticated."},"errors":null}
 * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
 * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
 */
class DivisionController extends Controller
{
    public function __construct(private readonly DivisionServiceInterface $divisionService) {}

    /**
     * Display a listing of the resource.
     *
     * @response 200 {
     *  "meta": {"status": "success", "code": 200, "message": "Data divisi berhasil diambil"},
     *  "data": [{"id": "019d8f4d-38a7-72b3-aa65-20c9d3d0ef10", "name": "Human Resources", "description": "Mengelola SDM"}]
     * }
     * @response 401 {
     *  "meta": {"code": 401, "status": "error", "message": "Unauthenticated."},
     *  "errors": null
     * }
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
     *
     * @response 201 {
     *  "meta": {"status": "success", "code": 201, "message": "Divisi baru berhasil ditambahkan"},
     *  "data": {"id": "019d8f4d-38a7-72b3-aa65-20c9d3d0ef10", "name": "Human Resources", "description": "Mengelola SDM"}
     * }
     * @response 422 {
     *  "meta": {"code": 422, "status": "error", "message": "Validasi request gagal."},
     *  "errors": {"name": ["The name has already been taken."]}
     * }
     */
    public function store(StoreDivisionRequest $request)
    {
        $this->authorize('create', Division::class);
        $division = $this->divisionService->create($request->validated());
        return $this->success($division, 'Divisi baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     *
     * @response 200 {
     *  "meta": {"status": "success", "code": 200, "message": "Detail divisi ditemukan"},
     *  "data": {"id": "019d8f4d-38a7-72b3-aa65-20c9d3d0ef10", "name": "Human Resources", "description": "Mengelola SDM"}
     * }
     * @response 403 {
     *  "meta": {"code": 403, "status": "error", "message": "Anda tidak memiliki izin untuk mengakses resource ini."},
     *  "errors": null
     * }
     * @response 404 {
     *  "meta": {"code": 404, "status": "error", "message": "Data yang diminta tidak ditemukan."},
     *  "errors": null
     * }
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
     *
     * @response 200 {
     *  "meta": {"status": "success", "code": 200, "message": "Data divisi berhasil diperbarui"},
     *  "data": {"id": "019d8f4d-38a7-72b3-aa65-20c9d3d0ef10", "name": "People Operations", "description": "Mengelola SDM"}
     * }
     * @response 403 {
     *  "meta": {"code": 403, "status": "error", "message": "Anda tidak memiliki izin untuk mengakses resource ini."},
     *  "errors": null
     * }
     * @response 404 {
     *  "meta": {"code": 404, "status": "error", "message": "Data yang diminta tidak ditemukan."},
     *  "errors": null
     * }
     * @response 422 {
     *  "meta": {"code": 422, "status": "error", "message": "Validasi request gagal."},
     *  "errors": {"name": ["The name field is required."]}
     * }
     */
    public function update(StoreDivisionRequest $request, Division $division)
    {
        $this->authorize('update', $division);
        $updatedDivision = $this->divisionService->update($division, $request->validated());
        return $this->success($updatedDivision, 'Data divisi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @response 200 {
     *  "meta": {"status": "success", "code": 200, "message": "Divisi berhasil dihapus (Soft Delete)"},
     *  "data": null
     * }
     * @response 403 {
     *  "meta": {"code": 403, "status": "error", "message": "Anda tidak memiliki izin untuk mengakses resource ini."},
     *  "errors": null
     * }
     * @response 404 {
     *  "meta": {"code": 404, "status": "error", "message": "Data yang diminta tidak ditemukan."},
     *  "errors": null
     * }
     */
    public function destroy(Division $division)
    {
        $this->authorize('delete', $division);
        $this->divisionService->delete($division);
        return $this->success(null, 'Divisi berhasil dihapus (Soft Delete)');
    }
}
