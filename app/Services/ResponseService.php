<?php

namespace App\Services;

use App\Interfaces\ResponseInterface;

class ResponseService implements ResponseInterface
{
    public function errorResponse($response, $error, $status_code)
    {

        return response()->json(
            [
                'success' => false,
                'response' => $response,
                'error' => $error
            ],
            $status_code
        );
    }

    public function exceptionErrorResponse($response, $error, $exception)
    {

        if (app()->environment('production')) {

            \Log::critical('Error: ' . $exception);
        } else {

            \Log::info('Error: ' . $exception);
        }
        return response()->json(
            [
                'success' => false,
                'response' => $response,
                'error' => $error
            ],
            500
        );
    }

    public function successResponse($response)
    {
        return response()->json(
            [
                'success' => true,
                'response' => $response,

            ],
            200
        );
    }
}
