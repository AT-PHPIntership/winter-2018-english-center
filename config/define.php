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
    'import_file' => [
        'line_defaul' => 0,
        'line_error' => 2,
        'api' => 'https://od-api.oxforddictionaries.com/api/v1/entries/en/',
    ],
];
