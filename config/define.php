<?php

return [
    'page_site' => 20,
    'courses' => [
        'limit_rows' => 10,
        'order_by_desc' =>'desc',
        'vip' => 'VIP',
        'trial' => 'TRIAL',
    ],
    'oxford' => [
        'app_id' => env('OXFORD_ID'),
        'app_key' => env('OXFORD_KEY'),
    ],
];
