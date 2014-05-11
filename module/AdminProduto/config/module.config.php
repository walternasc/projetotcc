<?php

namespace AdminProduto;

//confira rotas
return array(
    'router' => array(
        'routes' => array(
            //rota(s)
            'produto' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/adminproduto[/:action][/:id]',
                    'defaults' => array(
                        'controller' => 'adminproduto',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    //configura os controllers
    'controllers' => array(
        'invokables' => array(
            'adminproduto' => 'AdminProduto\Controller\AdminProdutoController',
        ),
    ),
    //configurações extra da aplicação
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
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
