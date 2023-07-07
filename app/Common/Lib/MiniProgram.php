<?php

namespace App\Common\Lib;

use App\Exceptions\BadRequestException;
use EasyWeChat\Factory;
use EasyWeChat\Kernel\Exceptions\InvalidConfigException;
use Throwable;
use App\Common\Lib\Result;

class MiniProgram
{
    public static function app()
    {
        $config = [
            'app_id'        => config('miniprogram.wechat.appid'),
            'secret'        => config('miniprogram.wechat.secret'),

            // 下面为可选项
            // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
            'response_type' => 'array',

            'log' => [
                'level' => 'debug',
                'file'  => base_path() . '/storage/logs/wechat.log',
            ],
        ];

        return Factory::miniProgram($config);
    }

    /**
     * 根据 jsCode 获取用户 session 信息
     * @param $code
     * @return array
     * @throws BadRequestException
     * @throws InvalidConfigException
     * @throws Throwable
     */
    public static function jscode2session($code)
    {
        $app = self::app();
        try {
            $result = $app->auth->session($code);
        } catch (InvalidConfigException $e) {
            // throw new BadRequestException(['msg' => '小程序配置错误']);
            return Result::error('小程序配置错误');
        } catch (Throwable $throwable) {
            if (stripos($throwable->getMessage(), 'Request access_token fail') !== false) {
                // throw new BadRequestException(['msg' => '获取access_token失败，请检查配置']);
                return Result::error('获取access_token失败，请检查配置');
            }
            throw $throwable;
        }

        if (isset($result['errcode'])) {
            // throw new BadRequestException(['msg' => $result['errmsg'], 'errorCode' => $result['errcode']]);
            return Result::error($result['errmsg']);
        }

        return $result;
    }
}
