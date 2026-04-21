<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContractTemplateRequest;
use App\Models\ContractTemplate;
use App\Contracts\Services\ContractTemplateServiceInterface;

/**
 * @group Operational - Contract Templates
 * API pengelolaan template kontrak kerja.
 *
 * @response 401 {"meta":{"code":401,"status":"error","message":"Unauthenticated."},"errors":null}
 * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
 * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
 */
class ContractTemplateController extends Controller
{
    public function __construct(private readonly ContractTemplateServiceInterface $contractTemplateService) {}

    /**
     * Display a listing of the resource.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Data template kontrak berhasil diambil"},"data":[{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef40","name":"PKWT Standard 1 Tahun","is_active":true}]}
     */
    public function index()
    {
        $this->authorize('viewAny', ContractTemplate::class);
        $templates = $this->contractTemplateService->getAll();
        return $this->success($templates, 'Data template kontrak berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @response 201 {"meta":{"status":"success","code":201,"message":"Template kontrak baru berhasil ditambahkan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef40","name":"PKWT Standard 1 Tahun","is_active":true}}
     */
    public function store(StoreContractTemplateRequest $request)
    {
        $this->authorize('create', ContractTemplate::class);
        $template = $this->contractTemplateService->create($request->validated());
        return $this->success($template, 'Template kontrak baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Detail template kontrak ditemukan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef40","name":"PKWT Standard 1 Tahun","body":"Perjanjian kerja...","is_active":true}}
     * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
     * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function show(ContractTemplate $contractTemplate)
    {
        $this->authorize('view', $contractTemplate);
        return $this->success($this->contractTemplateService->show($contractTemplate), 'Detail template kontrak ditemukan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Data template kontrak berhasil diperbarui"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0ef40","name":"PKWT Revisi","is_active":true}}
     * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
     * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function update(StoreContractTemplateRequest $request, ContractTemplate $contractTemplate)
    {
        $this->authorize('update', $contractTemplate);
        $updatedTemplate = $this->contractTemplateService->update($contractTemplate, $request->validated());
        return $this->success($updatedTemplate, 'Data template kontrak berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @response 200 {"meta":{"status":"success","code":200,"message":"Template kontrak berhasil dihapus"},"data":null}
     * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
     * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function destroy(ContractTemplate $contractTemplate)
    {
        $this->authorize('delete', $contractTemplate);
        $this->contractTemplateService->delete($contractTemplate);
        return $this->success(null, 'Template kontrak berhasil dihapus');
    }
}
