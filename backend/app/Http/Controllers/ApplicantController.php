<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicantRequest;
use App\Models\Applicant;
use App\Contracts\Services\ApplicantServiceInterface;

class ApplicantController extends Controller
{
    public function __construct(private readonly ApplicantServiceInterface $applicantService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Applicant::class);
        $applicants = $this->applicantService->getAll();
        return $this->success($applicants, 'Data pelamar berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicantRequest $request)
    {
        $this->authorize('create', Applicant::class);
        $applicant = $this->applicantService->create($request->validated());
        return $this->success($applicant, 'Pelamar baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Applicant $applicant)
    {
        $this->authorize('view', $applicant);
        return $this->success($this->applicantService->show($applicant), 'Detail pelamar ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreApplicantRequest $request, Applicant $applicant)
    {
        $this->authorize('update', $applicant);
        $updatedApplicant = $this->applicantService->update($applicant, $request->validated());
        return $this->success($updatedApplicant, 'Data pelamar berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applicant $applicant)
    {
        $this->authorize('delete', $applicant);
        $this->applicantService->delete($applicant);
        return $this->success(null, 'Data pelamar berhasil dihapus');
    }
}
