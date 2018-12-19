<?php

return [

    /*
     * Admin name setting.
     */
    'name' => '秋风阁管端',

    /*
     * Admin auth setting.
     */
    'auth' => [
        'guards' => [
            'admin' => [
                'driver'   => 'session',
                'provider' => 'admin',
            ],
        ],

        'providers' => [
            'admin' => [
                'driver' => 'eloquent',
                'model'  => App\Models\Administrator::class,
            ],
        ],
    ],

    /*
     * Blog-admin upload setting.
     */
    'upload' => [

        'disk' => env('UPLOAD_DISK', 'upload'),

        'directory' => [
            'image' => 'images/' . date('Ymd'),
            'file'  => 'files/' . date('Ymd'),
        ],
    ],

];
