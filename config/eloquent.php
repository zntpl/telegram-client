<?php

return [
    'fixture' => [
        'directory' => [
            'default' => '/src/Dialog/Domain/Fixtures',
        ],
    ],
    'migrate' => [
        'directory' => [
            'default' => '/src/Migrations',
            '/src/Dialog/Domain/Migrations',
            '/vendor/znsandbox/sandbox/src/Telegram/Migrations',
            '/vendor/my-bundles/top/src/Domain/Migrations',
        ],
    ],
];
