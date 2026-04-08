<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicantRequest;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Applicant::class);
        $applicants = Applicant::with(['jobVacancy'])->get();
        return $this->success($applicants, 'Data pelamar berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicantRequest $request)
    {
        $this->authorize('create', Applicant::class);
        $applicant = Applicant::create($request->validated());
        return $this->success($applicant->load(['jobVacancy']), 'Pelamar baru berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Applicant $applicant)
    {
        $this->authorize('view', $applicant);
        return $this->success($applicant->load(['jobVacancy']), 'Detail pelamar ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreApplicantRequest $request, Applicant $applicant)
    {
        $this->authorize('update', $applicant);
        $applicant->update($request->validated());
        $applicant->refresh();
        return $this->success($applicant->load(['jobVacancy']), 'Data pelamar berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applicant $applicant)
    {
        $this->authorize('delete', $applicant);
        $applicant->delete();
        return $this->success(null, 'Data pelamar berhasil dihapus');
    }
}
