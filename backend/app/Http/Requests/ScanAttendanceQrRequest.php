<?php

namespace App\Http\Requests;

class ScanAttendanceQrRequest extends BaseApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'qr_token' => 'required|string|max:255',
            'shift_id' => 'required|uuid|exists:shifts,id',
            'check_in_lat' => 'required|numeric|between:-90,90',
            'check_in_long' => 'required|numeric|between:-180,180',
            'scanned_at' => 'nullable|date_format:Y-m-d H:i:s',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'qr_token' => [
                'description' => 'Token QR statis lokasi kantor.',
                'example' => 'LOC-HQ-QR-001',
            ],
            'shift_id' => [
                'description' => 'ID shift kerja saat scan QR.',
                'example' => '019d8f4d-38a7-72b3-aa65-20c9d3d0ef20',
            ],
            'check_in_lat' => [
                'description' => 'Latitude posisi saat scan QR.',
                'example' => -6.20095,
            ],
            'check_in_long' => [
                'description' => 'Longitude posisi saat scan QR.',
                'example' => 106.81651,
            ],
            'scanned_at' => [
                'description' => 'Waktu scan QR (Y-m-d H:i:s). Jika tidak diisi, server pakai waktu saat ini.',
                'example' => '2026-04-16 07:58:00',
            ],
        ];
    }
}
