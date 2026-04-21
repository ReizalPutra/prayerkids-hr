<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseApiRequest extends FormRequest
{
    /**
     * Return a consistent API error response when validation fails.
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'meta' => [
                'status' => 'error',
                'code' => 422,
                'message' => 'Validasi request gagal.',
            ],
            'errors' => $validator->errors(),
        ], 422));
    }

    /**
     * Return a consistent API error response when authorization fails.
     */
    protected function failedAuthorization(): void
    {
        throw new HttpResponseException(response()->json([
            'meta' => [
                'status' => 'error',
                'code' => 403,
                'message' => 'Anda tidak memiliki izin untuk melakukan aksi ini.',
            ],
            'errors' => null,
        ], 403));
    }
}
