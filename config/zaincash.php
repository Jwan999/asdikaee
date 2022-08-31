<?php


return [

    "merchant_id" => env('ZAIN_CASH_MERCHANT_ID', null),
    "secret" => env('ZAIN_CASH_SECRET', null),
    "msisdn" => env('ZAIN_CASH_MSISDN', null),
    "is_production"=>env('ZAIN_CASH_IS_PRODUCTION'),
];
