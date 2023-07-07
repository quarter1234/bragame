<?php

namespace App\Common\Lib;

use Illuminate\Http\JsonResponse;
use App\Common\Enum\ResponseCode;

class Result
{
    /**
     * 操作成功返回json数据
     * @param  $data
     * @param int  $httpCode
     * @return JsonResponse
     */
    public static function success($data = null, $httpCode = 200): JsonResponse
    {
        $response = [
            'code' => ResponseCode::HTTP_OK,
            'data' => $data,
            'message' => 'success'
        ];

        return self::json($response, $httpCode);
    }

    /**
     * 操作失败饭返回json数据
     * @param int    $errorCode
     * @param string $message
     * @param int    $httpCode
     * @return JsonResponse
     */
    public static function error(string $message = '操作失败', $errorCode = ResponseCode::CLIENT_PARAMETER_ERROR, int $httpCode = 400): JsonResponse
    {
        return self::json(
            [
                'code'    => $errorCode,
                'message' => $message
            ],
            $httpCode
        );
    }

    /**
     * @param $result
     * @param $httpCode
     * @return JsonResponse
     */
    public static function json($result, $httpCode = 200): JsonResponse
    {
        return response()->json($result, $httpCode);
    }
}
