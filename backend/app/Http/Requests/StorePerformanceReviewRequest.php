<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePerformanceReviewRequest extends FormRequest
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
            'reviewer_id' => 'required|uuid|exists:employees,id',
            'review_period' => 'required|string|max:255',
            'score_discipline' => 'nullable|integer|min:0|max:100',
            'note_discipline' => 'nullable|string',
            'score_target' => 'nullable|integer|min:0|max:100',
            'note_target' => 'nullable|string',
            'final_score' => 'required|numeric|min:0|max:100',
            'is_locked' => 'nullable|boolean',
        ];
    }
}
