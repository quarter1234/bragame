<?php

namespace App\Common\Lib;


use GuzzleHttp\Client;

class TelegramNotice
{
    public static function sendMessage(array $message)
    {
        $token = '6167368421:AAHqhjJDodV3qx6utjkSjTTFWV_yxSR8oYc';
        $chatId = '-870857264';
        $baseurl = "https://api.telegram.org/bot{$token}/sendMessage";

        $isStop = env("IS_STOP_TELEGRAM", false);
        if(!$isStop){
            $client = new Client([
                'verify' => false,
                'timeout' => 30, // Response timeout
                'connect_timeout' => 30, // Connection timeout
                'peer' => false
            ]); //初始化客户端
    
    
             $client->post($baseurl, [
                'form_params' => [        //参数组
                    'chat_id' => $chatId,
                    'text' => json_encode($message),
                    // 'parse_mode' => 'Markdown'
                ],
            ]);
        }
    }

    private static function formatContent(array $messages)
    {
        $msgStr = '';

        foreach ($messages as $key => $msg) {
           $msgStr .= '*' . $key. ' : ' .$msg. '  ';
        }

        return $msgStr;
    }
}
