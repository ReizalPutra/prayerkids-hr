<?php

namespace App\Http\Requests;

class StorePositionRequest extends BaseApiRequest
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
            'title' => 'required|string|max:255|unique:positions,title',
            'base_salary' => 'required|numeric|min:0',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'title' => [
                'description' => 'Nama jabatan yang unik.',
                'example' => 'HR Officer',
            ],
            'base_salary' => [
                'description' => 'Gaji pokok default untuk jabatan ini.',
                'example' => 5500000,
            ],
        ];
    }
}
