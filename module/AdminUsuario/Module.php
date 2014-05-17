<?php

//Nome do modulo(pasta(rota))

namespace AdminUsuario;

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

}
