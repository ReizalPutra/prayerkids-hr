<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobVacancyRequest;
use App\Models\JobVacancy;
use App\Contracts\Services\JobVacancyServiceInterface;

class JobVacancyController extends Controller
{
    public function __construct(private readonly JobVacancyServiceInterface $jobVacancyService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', JobVacancy::class);
        $vacancies = $this->jobVacancyService->getAll();
        return $this->success($vacancies, 'Data lowongan kerja berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobVacancyRequest $request)
    {
        $this->authorize('create', JobVacancy::class);
        $vacancy = $this->jobVacancyService->create($request->validated());
        return $this->success($vacancy, 'Lowongan kerja baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(JobVacancy $jobVacancy)
    {
        $this->authorize('view', $jobVacancy);
        return $this->success($this->jobVacancyService->show($jobVacancy), 'Detail lowongan kerja ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreJobVacancyRequest $request, JobVacancy $jobVacancy)
    {
        $this->authorize('update', $jobVacancy);
        $updatedVacancy = $this->jobVacancyService->update($jobVacancy, $request->validated());
        return $this->success($updatedVacancy, 'Data lowongan kerja berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobVacancy $jobVacancy)
    {
        $this->authorize('delete', $jobVacancy);
        $this->jobVacancyService->delete($jobVacancy);
        return $this->success(null, 'Lowongan kerja berhasil dihapus (Soft Delete)');
    }
}
