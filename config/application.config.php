<?php

$env = getenv('SERVER_TYPE');

return [
    'modules' => [
        'Zoop\MaggottModule',
        'DoctrineModule',
        'DoctrineMongoODMModule',
        'Zoop\ShardModule',
        'Zoop\Api',
        'Zoop\Common',
        'Zoop\Store',
        'Application'
    ],
    'module_listener_options' => [
        'config_glob_paths' => [sprintf('config/autoload/{,*.}{global,%s,local}.php', $env)],
        'config_cache_enabled' => ($env != 'development'),
        //'config_cache_enabled' => true,
        'config_cache_key'     => 'app_config',
        'cache_dir'            => 'data/cache/zf2',
        'check_dependencies'   => ($env == 'development')
    ],
];
