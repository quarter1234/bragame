<?php
/**
 * Created by PhpStorm.
 * User: hhcycj
 * Date: 2020/11/07
 * Time: 14:23
 */

namespace App\Common\Enum;

/**
 * http code 状态码
 * Class HttpCodeEnum
 * @package app\common\enum
 */
class HttpCodeEnum
{
    // 200 系列
    const OK       = 200;
    const CREATED  = 201;
    const ACCEPTED = 202; // 更新成功


    // 400 系列
    const BAD_REQUEST  = 400;
    const UNAUTHORIZED = 401;
    const FORBIDDEN    = 403;
    const NOT_FOUND    = 404;
    const NOT_ROLE     = 405;
    const NOT_PERMISSION = 406;

    // 500 系列
    const SERVER_ERROR = 500;
}
