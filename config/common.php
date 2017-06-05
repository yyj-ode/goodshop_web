<?php

return [
    'app_url'   => env('APP_URL', 'htttp://www.iqilong.com/'),
    'short_url' => env('SHORT_URL', 'www.iqilong.com'),
    'page_size' => env('PAGE_SIZE', '10'),

    'hashid_salt' => env('SALT', 'QiaLie168'),
    'hashid_len'  => env('HASH_ID_LEN', 12),

    'sphinx_port' => env('SPHINX_PORT', 9320),

    'sms_sign_name' => env('SMS_SIGN_NAME', 'QiaLie'),
    'sms_access_key'  => env('SMS_ACCESS_KEY', 12),
    'sms_access_secret'  => env('SMS_ACCESS_SECRET', 12),
];