<?php

return [
    
    'payurl' => "https://".app('app.url').":84/#/pages/deposit/add/add", // 支付网关地址
    'kyc' => "https://".app('app.url').":84/#/pages/audit/apply/apply", // kyc验证地址
    'draw' => "https://".app('app.url').":84/#/pages/withdraw/index",
    'transaction' => "https://".app('app.url').":84/#/pages/transaction/transaction",
    'payment' => "https://".app('app.url').":84/#/pages/deposit/managepayment/managepayment",
];
