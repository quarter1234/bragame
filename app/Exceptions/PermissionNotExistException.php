<?php
declare(strict_types=1);

namespace App\Exceptions;

use App\Common\Enum\ErrorCodeEnum;
use App\Common\Enum\HttpCodeEnum;

class PermissionNotExistException extends ApiBaseException
{
    public $code      = HttpCodeEnum::NOT_PERMISSION;
    public $msg       = '找不到权限';
    public $errorCode = ErrorCodeEnum::NOT_PERMISSION;
}
