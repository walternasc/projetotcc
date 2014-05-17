<?php

namespace AdminProduto;

//confira rotas
return array(
    'router' => array(
        'routes' => array(
            //rota(s)
            'usuario' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/adminusuario[/:action][/:id]',
                    'defaults' => array(
                        'controller' => 'adminusuario',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    //configura os controllers
    'controllers' => array(
        'invokables' => array(
            'adminusuario' => 'AdminUsuario\Controller\AdminUsuarioController',
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
