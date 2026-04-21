<?php

namespace App\Http\Requests;

class StoreJobVacancyRequest extends BaseApiRequest
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
            'position_id' => 'required|uuid|exists:positions,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'status' => 'nullable|in:open,closed',
            'expired_date' => 'required|date',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'position_id' => ['description' => 'ID jabatan untuk lowongan.', 'example' => '019d8f4d-38a7-72b3-aa65-20c9d3d0ef11'],
            'title' => ['description' => 'Judul lowongan kerja.', 'example' => 'Backend Developer'],
            'description' => ['description' => 'Deskripsi lowongan.', 'example' => 'Mengembangkan dan memelihara API HRIS.'],
            'requirements' => ['description' => 'Kualifikasi/kebutuhan kandidat.', 'example' => 'Minimal 2 tahun pengalaman Laravel.'],
            'status' => ['description' => 'Status lowongan: open atau closed.', 'example' => 'open'],
            'expired_date' => ['description' => 'Tanggal kadaluarsa lowongan.', 'example' => '2026-06-30'],
        ];
    }
}
