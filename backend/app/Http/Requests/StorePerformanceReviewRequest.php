<?php

namespace App\Http\Requests;

class StorePerformanceReviewRequest extends BaseApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'employee_id' => 'required|uuid|exists:employees,id',
            'reviewer_id' => 'required|uuid|exists:employees,id',
            'review_period' => 'required|string|max:255',
            'score_discipline' => 'nullable|integer|min:0|max:100',
            'note_discipline' => 'nullable|string',
            'score_target' => 'nullable|integer|min:0|max:100',
            'note_target' => 'nullable|string',
            'final_score' => 'required|numeric|min:0|max:100',
            'is_locked' => 'nullable|boolean',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'employee_id' => ['description' => 'ID karyawan yang dinilai.', 'example' => '019d8f4d-38a7-72b3-aa65-20c9d3d0efe9'],
            'reviewer_id' => ['description' => 'ID reviewer/penilai.', 'example' => '019d8f4d-38a7-72b3-aa65-20c9d3d0ef90'],
            'review_period' => ['description' => 'Periode penilaian.', 'example' => 'Q1-2026'],
            'score_discipline' => ['description' => 'Skor kedisiplinan (0-100).', 'example' => 88],
            'note_discipline' => ['description' => 'Catatan kedisiplinan.', 'example' => 'Datang tepat waktu secara konsisten.'],
            'score_target' => ['description' => 'Skor pencapaian target (0-100).', 'example' => 90],
            'note_target' => ['description' => 'Catatan pencapaian target.', 'example' => 'Mencapai 95% KPI bulanan.'],
            'final_score' => ['description' => 'Skor akhir performa.', 'example' => 89],
            'is_locked' => ['description' => 'Kunci hasil penilaian agar tidak bisa diubah.', 'example' => false],
        ];
    }
}
