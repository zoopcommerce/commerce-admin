<?php

return [
    'zoop' => [
        'juggernaut' => [
            'file_system' => [
                'directory' => 'data/cache/doctrine'
            ]
        ],
        'sage' => [
            'client' => 'guzzle',
            'clients' => [
                'guzzle' => [
                    'factory' => 'zoop.sage.client.guzzle',
                    'endpoint' => 'https://sage.zoopcommerce.com',
                    'key' => '',
                    'secret' => '',
                    'asynchronous' => false,
                ],
                'sqs' => [
                    'service' => 'zoop.sage.client.sqs',
                    'key' => '',
                    'secret' => '',
                    'region' => 'ap-southeast-1',
                    'queueName' => 'SageDevelopment'
                ],
            ],
            'endpoint' => 'https://sage.zoopcommerce.com'
        ],
    ],
    'doctrine' => [
        'odm' => [
            'connection' => [
                'default' => [
                    'dbname' => '%%%SAGE_MONGODB_DATABASE_NAME%%%',
                    'server' => '%%%SAGE_MONGODB_HOST%%%',
                    'port' => '27017',
                    'user' => '%%%SAGE_MONGODB_USERNAME%%%',
                    'password' => '%%%SAGE_MONGODB_PASSWORD%%%',
                ],
            ],
            'configuration' => [
                'default' => [
//                    'metadata_cache' => 'doctrine.cache.juggernaut.filesystem',
                    'metadata_cache' => 'doctrine.cache.array',
                    'generate_proxies' => false,
                    'proxy_dir' => 'data/proxies',
                    'proxy_namespace' => 'DoctrineMongoODMModule\Proxy',
                    'generate_hydrators' => false,
                    'hydrator_dir' => 'data/hydrators',
                    'hydrator_namespace' => 'DoctrineMongoODMModule\Hydrator',
                    'default_db' => '%%%SAGE_MONGODB_DATABASE_NAME%%%',
                ]
            ],
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => false,
        'display_exceptions' => false,
    ],
];
