<?php

namespace App\Traits;

trait ApiResponse
{
    public function success($data, $message = 'Success', $code = 200)
    {
        return response()->json([
            'meta' => [
                'status' => 'success',
                'code' => $code,
                'message' => $message,
            ],
            'data' => $data,
        ], $code);
    }

    public function error($message, $code = 400, $errors = null)
    {
        return response()->json([
            'meta' => [
                'status' => 'error',
                'code' => $code,
                'message' => $message,
            ],
            'errors' => $errors,
        ], $code);
    }
}