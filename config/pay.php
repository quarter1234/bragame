<?php

return [
    
    'payurl' => config('app.url').":84/#/pages/deposit/add/add", // 支付网关地址
    'kyc' => config('app.url').":84/#/pages/audit/apply/apply", // kyc验证地址
    'draw' => config('app.url').":84/#/pages/withdraw/index",
    'transaction' => config('app.url').":84/#/pages/transaction/transaction",
    'payment' => config('app.url').":84/#/pages/deposit/managepayment/managepayment",
    //'post_pay' => config('app.url').":83/order/pay",
    'post_pay' => env("APP_PAYURL", false)."/order/pay",
];
