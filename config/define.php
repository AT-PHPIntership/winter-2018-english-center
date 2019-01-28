<?php

return [
    'page_site' => 20,
    'page_site_vocabulary' => 10,
    'courses' => [
        'limit_rows' => 10,
        'order_by_desc' =>'desc',
        'vip' => 'VIP',
        'trial' => 'TRIAL',
    ],
    'order_by_desc' =>'desc',
    'vip' => 'VIP',
    'trial' => 'TRIAL',
    'oxford' => [
        'app_id' => env('OXFORD_ID'),
        'app_key' => env('OXFORD_KEY'),
        'get_api' => env('GET_API'),
    ],
    'import_file' => [
        'line_defaul' => 0,
        'line_error' => 2,
        'file_error' => 'Vocabulary is wrong',
    ],
];
