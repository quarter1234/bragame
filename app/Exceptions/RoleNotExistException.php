<?php
declare(strict_types=1);

namespace App\Exceptions;

use App\Common\Enum\ErrorCodeEnum;
use App\Common\Enum\HttpCodeEnum;

class RoleNotExistException extends ApiBaseException
{
    public $code      = HttpCodeEnum::NOT_ROLE;
    public $msg       = '找不到角色';
    public $errorCode = ErrorCodeEnum::NOT_ROLE;
}
