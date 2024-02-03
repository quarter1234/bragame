<?php
/**
 * Created by PhpStorm.
 * User: hhcycj
 * Date: 2020/12/08
 * Time: 16:30
 */
declare(strict_types=1);

namespace App\Exceptions;

use App\Common\Enum\ErrorCodeEnum;
use App\Common\Enum\HttpCodeEnum;

class BadRequestException extends ApiBaseException
{
    public $code      = HttpCodeEnum::BAD_REQUEST;
    public $message   = '参数错误';
    public $errorCode = ErrorCodeEnum::ARGS_ERROR;
}

