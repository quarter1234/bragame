<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class BussinessException extends HttpException
{
    public function __construct(string $message = null, int $bussinessCode = 1000, int $httpCode = 400, array $headers = [])
    {
        parent::__construct($httpCode, $message, null, $headers, $bussinessCode);
    }
}

