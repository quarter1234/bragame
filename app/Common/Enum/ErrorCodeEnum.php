<?php
/**
 * Created by PhpStorm.
 * User: hhcycj
 * Date: 2020/12/08
 * Time: 15:40
 */
declare(strict_types=1);

namespace App\Common\Enum;

/**
 * 业务通用错误码
 * Class ErrorCodeEnum
 */
class ErrorCodeEnum
{
    public const UNKNOW_ERROR    = 999;  // 未知错误
    public const NEED_PERMISSION = 1000; // 权限不足
    public const NOT_FOUND       = 1001; // 资源不存在
    public const ARGS_ERROR      = 1002; // 参数错误
    public const FORM_ARGS_ERROR = 1003; // 表单验证失败
    public const CONFLICT        = 1004; // 资源冲突
    public const NOT_ROLE        = 1005; // 找不到角色
    public const NOT_PERMISSION  = 1006; // 找不到权限
}
