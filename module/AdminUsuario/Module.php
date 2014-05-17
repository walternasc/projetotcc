<?php

//Nome do modulo(pasta(rota))

namespace AdminUsuario;

use AdminUsuario\Service\Usuario as Usuario;

class Module {

    //Chama o module.config.php(criar rotas)
    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    //Configura namespace
    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php'
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    //Configura Serviços
    public function getServiceConfig() {
        return array(
            'factories' => array(
                'AdminUsuario\Service\Usuario' => function($service) {
            return new Usuario($service->get('Doctrine\ORM\EntityManager'));
        }
            ),
        );
    }

}
