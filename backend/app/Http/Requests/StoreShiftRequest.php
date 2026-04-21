<?php

namespace App\Http\Requests;

class StoreShiftRequest extends BaseApiRequest
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
            'name' => 'required|string|max:255|unique:shifts,name',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'Nama shift yang unik.',
                'example' => 'Pagi',
            ],
            'start_time' => [
                'description' => 'Jam mulai shift (format H:i:s).',
                'example' => '08:00:00',
            ],
            'end_time' => [
                'description' => 'Jam selesai shift (format H:i:s).',
                'example' => '17:00:00',
            ],
        ];
    }
}
