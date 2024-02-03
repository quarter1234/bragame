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
use Exception;
use Illuminate\Http\JsonResponse;

class ApiBaseException extends Exception
{
    // http 状态码
    public $code = HttpCodeEnum::BAD_REQUEST;

    // 错误信息
    public    $msg     = '参数错误';
    protected $message = '';

    // 错误码
    public $errorCode = ErrorCodeEnum::UNKNOW_ERROR;

    public function __construct($params = [])
    {
        if (!is_array($params)) {
            return;
        }

        if (array_key_exists('code', $params)) {
            $this->code = $params['code'];
        }

        if (array_key_exists('msg', $params)) {
            $this->msg     = $params['msg'];
            $this->message = $params['msg'];
        }

        if (array_key_exists('errorCode', $params)) {
            $this->errorCode = $params['errorCode'];
        }
    }

    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        $result = [
            'message'     => $this->msg,
            'code'        => $this->errorCode,
            'request_url' => request()->url()
        ];

        return response()->json(
            $result,
            $this->code,
            ['Content-type' => 'application/json; charset=utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }
}
