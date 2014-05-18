<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;
use AdminUsuario\Form\Login as LoginForm;

class AuthController extends AbstractActionController {

    public function indexAction() {

        $form = new LoginForm;
        $error = false;

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $data = $request->getPost()->toArray();

                $auth = new AuthenticationService;

                $sessionStorage = new SessionStorage("Admin");
                $auth->setStorage($sessionStorage);

                $authAdapter = $this->getServiceLocator()->get('Admin\Auth\Adapter');
                $authAdapter->setUsername($data['email'])
                        ->setPassword($data['senha']);

                $result = $auth->authenticate($authAdapter);

                if ($result->isValid()) {
                    $sessionStorage->write($auth->getIdentity()['user'], null);
                    return $this->redirect()->toRoute("admin", array('controller' => 'admin'));
                } else {
                    $error = true;
                }
            }
        }

        return new ViewModel(array('form' => $form, 'error' => $error));
    }

    public function logoutAction() {
        $auth = new AuthenticationService;
        $auth->setStorage(new SessionStorage('Admin'));
        $auth->clearIdentity();

        return $this->redirect()->toRoute('auth');
    }

}
