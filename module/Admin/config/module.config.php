<?php

namespace Admin;

//confira rotas
return array(
    'router' => array(
        'routes' => array(
            //rota(s)
            'admin' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin',
                    'defaults' => array(
                        'controller' => 'admin',
                        'action' => 'index',
                    ),
                ),
            ),
            'auth' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/auth',
                    'defaults' => array(
                        'controller' => 'auth',
                        'action' => 'index',
                    ),
                ),
            ),
            'logout' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/auth/logout',
                    'defaults' => array(
                        'controller' => 'auth',
                        'action' => 'logout',
                    ),
                ),
            ),
        ),
    ),
    //configura os controllers
    'controllers' => array(
        'invokables' => array(
            'admin' => 'Admin\Controller\AdminController',
            'auth' => 'Admin\Controller\AuthController',
        ),
    ),
    //configuração para diferentes layouts
    'module_layouts' => array(
        'Admin' => 'layout/layout-admin.phtml',
        'AdminProduto' => 'layout/layout-admin.phtml',
        'AdminUsuario' => 'layout/layout-admin.phtml'
    ),
    //configurações extra da aplicação
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    //Configuração do Doctrine
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    )
);
