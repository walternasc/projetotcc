<?php

//namespace (rota do arquivo)

namespace AdminProduto\Controller;

use Admin\Controller\CrudController;
use Zend\View\Model\ViewModel;

class AdminProdutoController extends CrudController {

    public function __construct() {
        $this->entity = "AdminProduto\Entity\Produto";
        $this->service = "AdminProduto\Service\Produto";
        $this->form = "AdminProduto\Form\Produto";
        $this->controller = "adminproduto";
        $this->route = "produto";
    }

    public function newAction() {
        $form = $this->getServiceLocator()->get($this->form);
        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->insert($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }

        return new ViewModel(array('form' => $form));
    }

}
