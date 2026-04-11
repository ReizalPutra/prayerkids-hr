<?php

namespace App\Http\Requests;

class StoreDivisionRequest extends BaseApiRequest
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
            'name' => 'required|string|max:255|unique:divisions,name',
            'description' => 'nullable|string',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'Nama divisi yang unik.',
                'example' => 'Human Resources',
            ],
            'description' => [
                'description' => 'Deskripsi singkat divisi.',
                'example' => 'Mengelola kebutuhan SDM dan administrasi karyawan.',
            ],
        ];
    }
}
