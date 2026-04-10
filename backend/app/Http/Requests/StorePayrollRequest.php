<?php

namespace App\Http\Requests;

class StorePayrollRequest extends BaseApiRequest
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
            'month' => 'required|string|max:20',
            'year' => 'required|integer|min:2000',
            'basic_salary_snapshot' => 'required|numeric|min:0',
            'allowance_details' => 'nullable|array',
            'deduction_details' => 'nullable|array',
            'net_salary' => 'required|numeric|min:0',
            'payment_status' => 'nullable|in:paid,pending',
            'payment_date' => 'nullable|date',
        ];
    }
}
