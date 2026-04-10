<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContractTemplateRequest;
use App\Models\ContractTemplate;
use App\Contracts\Services\ContractTemplateServiceInterface;

class ContractTemplateController extends Controller
{
    public function __construct(private readonly ContractTemplateServiceInterface $contractTemplateService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', ContractTemplate::class);
        $templates = $this->contractTemplateService->getAll();
        return $this->success($templates, 'Data template kontrak berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContractTemplateRequest $request)
    {
        $this->authorize('create', ContractTemplate::class);
        $template = $this->contractTemplateService->create($request->validated());
        return $this->success($template, 'Template kontrak baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ContractTemplate $contractTemplate)
    {
        $this->authorize('view', $contractTemplate);
        return $this->success($this->contractTemplateService->show($contractTemplate), 'Detail template kontrak ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreContractTemplateRequest $request, ContractTemplate $contractTemplate)
    {
        $this->authorize('update', $contractTemplate);
        $updatedTemplate = $this->contractTemplateService->update($contractTemplate, $request->validated());
        return $this->success($updatedTemplate, 'Data template kontrak berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContractTemplate $contractTemplate)
    {
        $this->authorize('delete', $contractTemplate);
        $this->contractTemplateService->delete($contractTemplate);
        return $this->success(null, 'Template kontrak berhasil dihapus');
    }
}
