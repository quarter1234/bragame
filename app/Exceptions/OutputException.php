<?php
/**
 * Created by PhpStorm.
 * User: dto
 * Date: 2019/12/20
 * Time: 17:57
 */

namespace App\Exceptions;


use Symfony\Component\HttpKernel\Exception\HttpException;

class OutputException extends HttpException
{
    public function __construct(string $message = null, int $statusCode = 400, array $headers = [])
    {
        parent::__construct($statusCode, $message, null, $headers, $statusCode);
    }
}