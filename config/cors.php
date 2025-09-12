<?php

return [

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'https://viyakaptan.com',
        'https://www.viyakaptan.com',
        'https://admin.viyacaptan.com',
        'https://admin.viyakaptan.com',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,
    'paths' => ['api/*'],

'allowed_methods' => ['*'],
'allowed_origins' => ['https://viyakaptan.com','https://www.viyakaptan.com'],
'allowed_headers' => ['*'],
'supports_credentials' => false,

];
