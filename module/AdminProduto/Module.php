<?php

//Nome do modulo(pasta(rota))

namespace AdminProduto;

use AdminProduto\Service\Produto as Produto;
use AdminProduto\Form\Produto as ProdutoFrm;

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
                'AdminProduto\Service\Produto' => function($service) {
            return new Produto($service->get('Doctrine\ORM\EntityManager'));
        },
                'AdminProduto\Form\Produto' => function($service) {
            $em = $service->get('Doctrine\ORM\EntityManager');
            $repository = $em->getRepository('AdminProduto\Entity\ProdutoGrupo');
            $grupos = $repository->FetchPairs();

            return new ProdutoFrm(null, $grupos);
        },
            ),
        );
    }

}
