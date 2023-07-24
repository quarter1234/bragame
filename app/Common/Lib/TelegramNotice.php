<?php

namespace App\Common\Lib;


use GuzzleHttp\Client;

class TelegramNotice
{
    public static function sendMessage($message)
    {
        $token = '6309972833:AAETPJB5H47KVkyfiMXwfee52Y5-LWwwMuU';
        $chatId = '-1001914606862';
        $baseurl = "https://api.telegram.org/bot{$token}/sendMessage";
        
        // ?chat_id=123456789&text=1234
        $client = new Client([
            'verify' => false,
            'timeout' => 30, // Response timeout
            'connect_timeout' => 30, // Connection timeout
            'peer' => false
        ]); //初始化客户端

       
        $response = $client->post($baseurl, [
            'form_params' => [        //参数组
                'chat_id' => $chatId,
                'text' => $message
            ],
        ]);
    }
}