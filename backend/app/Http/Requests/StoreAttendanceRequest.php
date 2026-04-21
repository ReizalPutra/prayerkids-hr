<?php

namespace App\Http\Requests;

class StoreAttendanceRequest extends BaseApiRequest
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
            'shift_id' => 'nullable|uuid|exists:shifts,id',
            'location_id' => 'nullable|uuid|exists:attendance_locations,id',
            'date' => 'required|date',
            'clock_in' => 'nullable|date_format:Y-m-d H:i:s',
            'clock_out' => 'nullable|date_format:Y-m-d H:i:s',
            'status' => 'nullable|in:on_time,late,absent,permit',
            'check_in_lat' => 'nullable|numeric|between:-90,90',
            'check_in_long' => 'nullable|numeric|between:-180,180',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'employee_id' => ['description' => 'ID karyawan.', 'example' => '019d8f4d-38a7-72b3-aa65-20c9d3d0efe9'],
            'shift_id' => ['description' => 'ID shift kerja terkait.', 'example' => '019d8f4d-38a7-72b3-aa65-20c9d3d0ef20'],
            'location_id' => ['description' => 'ID lokasi presensi.', 'example' => '019d8f4d-38a7-72b3-aa65-20c9d3d0ef30'],
            'date' => ['description' => 'Tanggal presensi.', 'example' => '2026-04-11'],
            'clock_in' => ['description' => 'Waktu check-in (Y-m-d H:i:s).', 'example' => '2026-04-11 08:03:00'],
            'clock_out' => ['description' => 'Waktu check-out (Y-m-d H:i:s).', 'example' => '2026-04-11 17:04:00'],
            'status' => ['description' => 'Status presensi.', 'example' => 'on_time'],
            'check_in_lat' => ['description' => 'Latitude saat check-in.', 'example' => -6.2009],
            'check_in_long' => ['description' => 'Longitude saat check-in.', 'example' => 106.8166],
        ];
    }
}
