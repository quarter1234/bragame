<?php
declare(strict_types=1);

namespace App\Exceptions;

use App\Common\Enum\ErrorCodeEnum;
use App\Common\Enum\HttpCodeEnum;

class AuthorizeException extends ApiBaseException
{
    public $code      = HttpCodeEnum::UNAUTHORIZED;
    public $msg       = '认证失败';
    public $errorCode = ErrorCodeEnum::NEED_PERMISSION;
}
