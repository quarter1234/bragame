<?php

return [
    
    'payurl' => "https://".config('app.url').":84/#/pages/deposit/add/add", // 支付网关地址
    'kyc' => "https://".config('app.url').":84/#/pages/audit/apply/apply", // kyc验证地址
    'draw' => "https://".config('app.url').":84/#/pages/withdraw/index",
    'transaction' => "https://".config('app.url').":84/#/pages/transaction/transaction",
    'payment' => "https://".config('app.url').":84/#/pages/deposit/managepayment/managepayment",
];
