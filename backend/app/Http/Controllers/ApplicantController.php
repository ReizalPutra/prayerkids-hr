<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicantRequest;
use App\Models\Applicant;
use App\Contracts\Services\ApplicantServiceInterface;

/**
 * @group Recruitment - Applicants
 * API pengelolaan data pelamar.
 *
 * @response 401 {"meta":{"code":401,"status":"error","message":"Unauthenticated."},"errors":null}
 * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
 * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
 */
class ApplicantController extends Controller
{
    public function __construct(private readonly ApplicantServiceInterface $applicantService) {}

    /**
     * Display a listing of the resource.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Data pelamar berhasil diambil"},"data":[{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efb1","name":"Siti Aminah","email":"siti.aminah@example.com","stage":"screening"}]}
     */
    public function index()
    {
        $this->authorize('viewAny', Applicant::class);
        $applicants = $this->applicantService->getAll();
        return $this->success($applicants, 'Data pelamar berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
        *
        * @response 201 {"meta":{"status":"success","code":201,"message":"Pelamar baru berhasil ditambahkan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efb1","name":"Siti Aminah","email":"siti.aminah@example.com","stage":"screening"}}
     */
    public function store(StoreApplicantRequest $request)
    {
        $this->authorize('create', Applicant::class);
        $applicant = $this->applicantService->create($request->validated());
        return $this->success($applicant, 'Pelamar baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Detail pelamar ditemukan"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efb1","name":"Siti Aminah","email":"siti.aminah@example.com","stage":"screening"}}
    * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
    * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function show(Applicant $applicant)
    {
        $this->authorize('view', $applicant);
        return $this->success($this->applicantService->show($applicant), 'Detail pelamar ditemukan');
    }

    /**
     * Update the specified resource in storage.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Data pelamar berhasil diperbarui"},"data":{"id":"019d8f4d-38a7-72b3-aa65-20c9d3d0efb1","stage":"interview"}}
          * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
          * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function update(StoreApplicantRequest $request, Applicant $applicant)
    {
        $this->authorize('update', $applicant);
        $updatedApplicant = $this->applicantService->update($applicant, $request->validated());
        return $this->success($updatedApplicant, 'Data pelamar berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
        *
        * @response 200 {"meta":{"status":"success","code":200,"message":"Data pelamar berhasil dihapus"},"data":null}
          * @response 403 {"meta":{"code":403,"status":"error","message":"Anda tidak memiliki izin untuk mengakses resource ini."},"errors":null}
          * @response 404 {"meta":{"code":404,"status":"error","message":"Data yang diminta tidak ditemukan."},"errors":null}
     */
    public function destroy(Applicant $applicant)
    {
        $this->authorize('delete', $applicant);
        $this->applicantService->delete($applicant);
        return $this->success(null, 'Data pelamar berhasil dihapus');
    }
}
