<?php

namespace App\Interfaces;

interface ResponseInterface
{
    public function exceptionErrorResponse($response, $error, $exception);

    public function successResponse($response);

    public function errorResponse($response, $error, $status_code);
}
