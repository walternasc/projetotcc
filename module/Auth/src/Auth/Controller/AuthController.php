<?php

namespace Auth\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;

//use AdminUsuario\Form\Login as LoginForm;

class AuthController extends AbstractActionController {

    public function indexAction() {
        $error = false;

        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $request->getPost()->toArray();

            $auth = new AuthenticationService;

            $sessionStorage = new SessionStorage("Admin");
            $auth->setStorage($sessionStorage);

            $authAdapter = $this->getServiceLocator()->get('Auth\Auth\Adapter');
            $authAdapter->setUsername($data['email'])
                    ->setPassword($data['senha']);

            $result = $auth->authenticate($authAdapter);

            if ($result->isValid()) {
                $sessionStorage->write($auth->getIdentity()['user'], null);
                return $this->redirect()->toRoute("loja", array('controller' => 'loja'));
            } else {
                $error = true;
            }
        }
        return $this->redirect()->toRoute("loja", array('controller' => 'loja'));
    }

    public function logoutAction() {
        $auth = new AuthenticationService;
        $auth->setStorage(new SessionStorage('Admin'));
        $auth->clearIdentity();

        return $this->redirect()->toRoute('auth');
    }

}
