<?php

return [
    'assetic_configuration' => [
        'debug' => false,
        'buildOnRequest' => true,
        'webPath' => __DIR__ . '/../../../public',
        'default' => [
            'assets' => [
                '@lib_js',
                '@zoop_admin_css',
            ],
            'options' => [
                'mixin' => true,
            ],
        ],
        'modules' => [
            'application' => [
                'root_path' => __DIR__ . '/../assets',
                'collections' => [
                    'zoop_admin_css' => [
                        'assets' => [
                            'css/zoop/admin/_base.less',
                        ],
                        'filters' => [
                            'LessphpFilter' => [
                                'name' => 'Assetic\Filter\LessphpFilter'
                            ],
                            'CssRewriteFilter' => [
                                'name' => 'Assetic\Filter\CssRewriteFilter'
                            ],
                        ],
                        'options' => [
                            'output' => 'css/admin.css'
                        ]
                    ],
                    'lib_js' => [
                        'assets' => [
                            'js/libs/ember/ember-1.6.1.js',
                            'js/libs/jquery/jquery-1.10.2.js',
                            'js/libs/handlebars/handlebars-1.1.2.js',
                        ],
                        'filters' => [
                            'JSMinFilter' => [
                                'name' => 'Assetic\Filter\JSMinFilter'
                            ]
                        ],
                        'options' => [
                            'output' => 'js/lib.js'
                        ]
                    ],
                    'global_images' => [
                        'assets' => [
                            'images/*.png',
                            'images/*.jpg',
                            'images/*.ico',
                        ],
                        'options' => [
                            'move_raw' => true,
                        ]
                    ],
                ],
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'home' => [
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => 'Application\Controller\Index',
                        'action' => 'index',
                    ],
                ],
            ],
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/application',
                    'defaults' => [
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'default' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/[:controller[/:action]]',
                            'constraints' => [
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'abstract_factories' => [
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ],
        'aliases' => [
            'translator' => 'MvcTranslator',
        ],
        'invokables' => [
            'AsseticCacheBuster' => 'AsseticBundle\CacheBuster\LastModifiedStrategy'
        ],
        'factories' => [
        ]
    ],
    'translator' => [
        'locale' => 'en_US',
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ],
        ],
    ],
    'controllers' => [
        'invokables' => [
            'Application\Controller\Index' => 'Application\Controller\IndexController'
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    // Placeholder for console routes
    'console' => [
        'router' => [
            'routes' => [
            ],
        ],
    ],
];
