<?php
$baseUrl = app('app.url');
return [
    
    'payurl' => "https://{$baseUrl}:84/#/pages/deposit/add/add", // 支付网关地址
    'kyc' => "https://{$baseUrl}:84/#/pages/audit/apply/apply", // kyc验证地址
    'draw' => "https://{$baseUrl}:84/#/pages/withdraw/index",
    'transaction' => "https://{$baseUrl}:84/#/pages/transaction/transaction",
    'payment' => "https://{$baseUrl}:84/#/pages/deposit/managepayment/managepayment",
];
