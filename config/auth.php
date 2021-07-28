<?php

return [
    'defaults' => [
        'guard' => 'auth',
        'passwords' => 'customers',
    ],

    'guards' => [
        'auth' => [
            'driver' => 'jwt',
            'provider' => 'customers',
        ],
    ],

    'providers' => [
        'customers' => [
            'driver' => 'eloquent',
            'model' => \App\Models\Customers::class
        ]
    ]
];