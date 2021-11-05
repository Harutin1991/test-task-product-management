<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Storage disk where will be uploaded files
    |--------------------------------------------------------------------------
    */

    'disk' => 'public',

    /*
    |--------------------------------------------------------------------------
    | Default path where files will be uploaded in storage
    |--------------------------------------------------------------------------
    */

    'default_path' => '/',

    'storageDisks' => [
        \ConstStorageDisks::PUBLIC => 'public',
        \ConstStorageDisks::LOCAL => 'local',
        \ConstStorageDisks::S3 => 's3'
    ]
];
