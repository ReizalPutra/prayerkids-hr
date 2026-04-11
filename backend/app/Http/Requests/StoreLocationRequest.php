<?php

namespace App\Http\Requests;

class StoreLocationRequest extends BaseApiRequest
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
            'name' => 'required|string|max:255|unique:attendance_locations,name',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'radius_meter' => 'nullable|integer|min:1',
            'qr_token' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'Nama lokasi presensi yang unik.',
                'example' => 'Kantor Pusat',
            ],
            'latitude' => [
                'description' => 'Koordinat latitude lokasi.',
                'example' => -6.2009,
            ],
            'longitude' => [
                'description' => 'Koordinat longitude lokasi.',
                'example' => 106.8166,
            ],
            'radius_meter' => [
                'description' => 'Radius toleransi presensi dalam meter.',
                'example' => 100,
            ],
            'qr_token' => [
                'description' => 'Token QR untuk presensi berbasis QR.',
                'example' => 'LOC-HQ-QR-001',
            ],
            'is_active' => [
                'description' => 'Status aktif lokasi.',
                'example' => true,
            ],
        ];
    }
}
