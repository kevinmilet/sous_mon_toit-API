<?php

return [
    'defaults' => [
        'guard' => 'customer',
        'passwords' => 'customers',
    ],

    'guards' => [
        'customer' => [
            'driver' => 'jwt',
            'provider' => 'customers',
        ],
        'staff' => [
            'driver' => 'jwt',
            'provider' => 'staffs',
        ]
    ],

    'providers' => [
        'customers' => [
            'driver' => 'eloquent',
            'model' => \App\Models\Customers::class
        ],
        'staffs' => [
            'driver' => 'eloquent',
            'model' => \App\Models\Staffs::class
        ]
    ]
];