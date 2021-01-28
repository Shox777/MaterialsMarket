<?php

namespace App\Traits;
/**
 * 
 */
trait responseTrait
{
    protected function successResponse($message, $data = [], int $status = 200)
    {
        return response([
            'success' => true,
            'error' => false,
            'data' => $data,
            'message' => $message,
        ], $status);
    }

    protected function errorResponse($message, int $status = 422)
    {
        return response([
            'success' => false,
            'error' => true,
            'message' => $message,
        ], $status);
    }
}
