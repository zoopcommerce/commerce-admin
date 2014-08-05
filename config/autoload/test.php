<?php

return [
    'zoop' => [
        'sage' => [
            'client' => 'guzzle',
            'clients' => [
                'guzzle' => [
                    'factory' => 'zoop.sage.client.guzzle',
                    'endpoint' => 'http://sage.zoopcommerce.local',
                    'key' => 'zoop',
                    'secret' => 'testPassword',
                    'asynchronous' => false,
                ],
                'sqs' => [
                    'service'   => 'zoop.sage.client.sqs',
                    'key'       => 'AKIAINQCVXNRTIGNUJ7Q',
                    'secret'    => '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',
                    'region'    => 'ap-southeast-1',
                    'queueName' => 'SageDevelopment'
                ],
            ],
            'endpoint' => 'http://sage.zoopcommerce.local'
        ],
    ],
    'doctrine' => [
        'odm' => [
            'connection' => [
                'default' => [
                    'dbname' => 'sage_test',
                    'server' => 'localhost',
                    'port' => '27017',
                    'user' => null,
                    'password' => null,
                ],
            ],
            'configuration' => [
                'default' => [
                    'metadata_cache' => 'doctrine.cache.array',
                    'generate_proxies' => true,
                    'generate_hydrators' => true,
                    'default_db' => 'sage_test',
                ]
            ],
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
    ],
];
