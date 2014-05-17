<?php

//namespace (rota do arquivo)

namespace AdminUsuario\Controller;

use Admin\Controller\CrudController,
    Zend\View\Model\ViewModel;

class AdminUsuarioController extends CrudController {

    public function __construct() {
        $this->entity = "AdminUsuario\Entity\Usuario";
        $this->service = "AdminUsuario\Service\Usuario";
        $this->form = "AdminUsuario\Form\Usuario";
        $this->controller = "adminusuario";
        $this->route = "usuario";
    }

    public function indexAction() {

        $list = "sdçfl";
        return new ViewModel(array('data' => $list));
    }

}
