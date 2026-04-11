<?php

namespace App\Http\Requests;

class StoreApplicantRequest extends BaseApiRequest
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
            'job_vacancy_id' => 'required|uuid|exists:job_vacancies,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'resume_path' => 'required|string',
            'stage' => 'nullable|in:applied,screening,interview,offering,hired,rejected',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'job_vacancy_id' => ['description' => 'ID lowongan yang dilamar.', 'example' => '019d8f4d-38a7-72b3-aa65-20c9d3d0efa1'],
            'name' => ['description' => 'Nama lengkap pelamar.', 'example' => 'Siti Aminah'],
            'email' => ['description' => 'Email pelamar.', 'example' => 'siti.aminah@example.com'],
            'phone' => ['description' => 'Nomor telepon pelamar.', 'example' => '081234567899'],
            'resume_path' => ['description' => 'Path file CV/resume.', 'example' => 'resumes/siti-aminah.pdf'],
            'stage' => ['description' => 'Tahap proses rekrutmen.', 'example' => 'screening'],
        ];
    }
}
