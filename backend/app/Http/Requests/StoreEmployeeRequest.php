<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'user_id' => 'required|uuid|exists:users,id',
            'nik' => 'required|string|max:50|unique:employees,nik',
            'full_name' => 'required|string|max:255',
            'division_id' => 'nullable|uuid|exists:divisions,id',
            'position_id' => 'nullable|uuid|exists:positions,id',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'gender' => 'required|in:L,P',
            'join_date' => 'required|date',
            'contract_start_date' => 'nullable|date',
            'contract_end_date' => 'nullable|date',
            'contract_number' => 'nullable|string',
            'leave_quota' => 'nullable|integer|min:0',
            'basic_salary' => 'required|numeric|min:0',
            'status' => 'nullable|in:active,resigned,suspended',
        ];
    }
}
