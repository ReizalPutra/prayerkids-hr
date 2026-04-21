<?php

namespace App\Http\Requests;

class StoreContractTemplateRequest extends BaseApiRequest
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
            'name' => 'required|string|max:255',
            'body' => 'required|string',
            'is_active' => 'nullable|boolean',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'Nama template kontrak.',
                'example' => 'PKWT Standard 1 Tahun',
            ],
            'body' => [
                'description' => 'Isi template kontrak.',
                'example' => 'Perjanjian kerja waktu tertentu selama 1 tahun ...',
            ],
            'is_active' => [
                'description' => 'Status aktif template.',
                'example' => true,
            ],
        ];
    }
}
