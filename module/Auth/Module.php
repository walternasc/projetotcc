<?php

//Nome do modulo(pasta(rota))

namespace Auth;

use Zend\Authentication\AuthenticationService,
    Zend\Authentication\Storage\Session as SessionStorage;
use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\MvcEvent;
use Auth\Auth\Adapter as AuthAdapter;

class Module {

    //Verfica se estar logado
    public function init(ModuleManager $moduleManager) {
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();

        $sharedEvents->attach("Zend\Mvc\Controller\AbstractActionController", MvcEvent::EVENT_DISPATCH, array($this, "validaAuth"), 100);
    }

    public function validaAuth($e) {
        $auth = new AuthenticationService;
        $auth->setStorage(new SessionStorage("Admin"));

        $controller = $e->getTarget();
        $matchedRoute = $controller->getEvent()->getRouteMatch()->getMatchedRouteName();
        if (!$auth->hasIdentity() and ($matchedRoute == "usuario" or $matchedRoute == "produto")) {
            return $controller->redirect()->toRoute("auth");
        }
    }

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
                'Auth\Auth\Adapter' => function($service) {
            return new AuthAdapter($service->get('Doctrine\ORM\EntityManager'));
        }
            ),
        );
    }

    //Para alguma coisa com o layout
    public function getViewHelperConfig() {
        return array(
            'invokables' => array(
                'UserIdentity' => new View\Helper\UserIdentity()
            )
        );
    }

}
