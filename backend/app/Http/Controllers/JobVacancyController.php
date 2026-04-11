<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobVacancyRequest;
use App\Models\JobVacancy;
use App\Contracts\Services\JobVacancyServiceInterface;

/**
 * @group Recruitment - Job Vacancies
 * API pengelolaan lowongan kerja.
 *
 * @response 401 {"meta":{"code":401,"status":"error","message":"Unauthenticated."},"errors":null}
 * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
 * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
 */
class JobVacancyController extends Controller
{
    public function __construct(private readonly JobVacancyServiceInterface $jobVacancyService) {}

    /**
     * Display a listing of the resource.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Data lowongan kerja berhasil diambil"},"data":[{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efa1","title":"Backend Developer","status":"open"}]}
     */
    public function index()
    {
        $this->authorize('viewAny', JobVacancy::class);
        $vacancies = $this->jobVacancyService->getAll();
        return $this->success($vacancies, 'Data lowongan kerja berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
        *
        * @response 201 {"meta":{"status":"success","code":201,"message":"Lowongan kerja baru berhasil ditambahkan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efa1","title":"Backend Developer","status":"open"}}
     */
    public function store(StoreJobVacancyRequest $request)
    {
        $this->authorize('create', JobVacancy::class);
        $vacancy = $this->jobVacancyService->create($request->validated());
        return $this->success($vacancy, 'Lowongan kerja baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Detail lowongan kerja ditemukan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efa1","title":"Backend Developer","status":"open"}}
          * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
          * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function show(JobVacancy $jobVacancy)
    {
        $this->authorize('view', $jobVacancy);
        return $this->success($this->jobVacancyService->show($jobVacancy), 'Detail lowongan kerja ditemukan');
    }

    /**
     * Update the specified resource in storage.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Data lowongan kerja berhasil diperbarui"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efa1","status":"closed"}}
          * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
          * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function update(StoreJobVacancyRequest $request, JobVacancy $jobVacancy)
    {
        $this->authorize('update', $jobVacancy);
        $updatedVacancy = $this->jobVacancyService->update($jobVacancy, $request->validated());
        return $this->success($updatedVacancy, 'Data lowongan kerja berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Lowongan kerja berhasil dihapus (Soft Delete)"},"data":null}
          * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
          * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function destroy(JobVacancy $jobVacancy)
    {
        $this->authorize('delete', $jobVacancy);
        $this->jobVacancyService->delete($jobVacancy);
        return $this->success(null, 'Lowongan kerja berhasil dihapus (Soft Delete)');
    }
}
