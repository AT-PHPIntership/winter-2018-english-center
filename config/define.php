<?php

return [
    'page_site' => 20,
    'page_site_vocabulary' => 10,
    'page_site_exercise' => 6,
    'courses' => [
        'limit_courses' => 3,
        'limit_rows' => 20,
        'order_by_desc' =>'desc',
        'vip' => 'VIP',
        'trial' => 'TRIAL',
        'page_site_course' => 6,
        'page_site' => 4,
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
    'recent_lessons' => 5,
    'lessons' => [
        'page_site' => 4,
    ],
    'length_course' => 123,
    'role' => [
        'admin' => 0,
    ],
];
