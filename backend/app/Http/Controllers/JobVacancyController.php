<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobVacancyRequest;
use App\Models\JobVacancy;
use Illuminate\Http\Request;

class JobVacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', JobVacancy::class);
        $vacancies = JobVacancy::with(['position'])->get();
        return $this->success($vacancies, 'Data lowongan kerja berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobVacancyRequest $request)
    {
        $this->authorize('create', JobVacancy::class);
        $vacancy = JobVacancy::create($request->validated());
        return $this->success($vacancy->load(['position']), 'Lowongan kerja baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(JobVacancy $jobVacancy)
    {
        $this->authorize('view', $jobVacancy);
        return $this->success($jobVacancy->load(['position']), 'Detail lowongan kerja ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreJobVacancyRequest $request, JobVacancy $jobVacancy)
    {
        $this->authorize('update', $jobVacancy);
        $jobVacancy->update($request->validated());
        $jobVacancy->refresh();
        return $this->success($jobVacancy->load(['position']), 'Data lowongan kerja berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobVacancy $jobVacancy)
    {
        $this->authorize('delete', $jobVacancy);
        $jobVacancy->delete();
        return $this->success(null, 'Lowongan kerja berhasil dihapus (Soft Delete)');
    }
}
