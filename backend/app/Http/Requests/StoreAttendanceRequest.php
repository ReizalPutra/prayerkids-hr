<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttendanceRequest extends FormRequest
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
}
