<?php
return [
    'wechat' => [
        'app_id'           => env('MINIPROGRAM_APPID'),
        'secret'           => env('MINIPROGRAM_SECRET'),
        'sandbox'          => env('MINIPROGRAM_SANDBOX'),
        'notify_url'       => env('MINIPROGRAM_NOTIFY_URL'),
        'price'            => env('MINIPROGRAM_PRICE'),
        'douyin_price'     => env('MINIPROGRAM_DOUYIN_PRICE', 988),
        'kuaishou_price'   => env('MINIPROGRAM_KUAISHOU_PRICE', 988),
        'invte_price'      => env('MINIPROGRAM_INVITE_PRICE', 30),
        'isallPirce'       => env('MINIPROGRAM_ISALL_PRICE'),
        'mch_id'           => env('MINIPROGRAM_MCHID', '1601436365'),
        'key'              => env('MINIPROGRAM_KEY', '898ec2677fb895d5cc4369f0ceab671c'),
        'serial'           => env('MINIPROGRAM_SERIAL_NO'),
        'cert_path'        => env('MINIPROGRAM_PAY_CERT'),
        'key_path'         => env('MINIPROGRAM_PAY_KEY'),
        'debug'            => false,
        'log'              => ['level' => 'error'],
        'uniformMessage'   => 'https://api.weixin.qq.com/cgi-bin/message/wxopen/template/uniform_send?access_token=',
    ]
];
