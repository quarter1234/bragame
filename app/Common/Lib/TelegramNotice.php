<?php

namespace App\Common\Lib;


use GuzzleHttp\Client;

class TelegramNotice
{
    public static function sendMessage(array $message)
    {
        $token = '6472966435:AAGKDwGoCx9WgqBNuGVZCznc0ggjeEzWYuQ';
        $chatId = '-1001914606862';
        $baseurl = "https://api.telegram.org/bot{$token}/sendMessage";
        // https://api.telegram.org/bot6472966435:AAGKDwGoCx9WgqBNuGVZCznc0ggjeEzWYuQ/getUpdates
        
        // ?chat_id=123456789&text=1234
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

    private static function formatContent(array $messages)
    {
        $msgStr = '';

        foreach ($messages as $key => $msg) {
           $msgStr .= '*' . $key. ' : ' .$msg. '  ';
        }

        return $msgStr;
    }
}