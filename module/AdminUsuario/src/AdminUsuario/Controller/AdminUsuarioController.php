<?php

//namespace (rota do arquivo)

namespace AdminUsuario\Controller;

use Admin\Controller\CrudController;

class AdminUsuarioController extends CrudController {

    public function __construct() {
        $this->entity = "AdminUsuario\Entity\Usuario";
        $this->service = "AdminUsuario\Service\Usuario";
        $this->form = "AdminUsuario\Form\Usuario";
        $this->controller = "adminusuario";
        $this->route = "usuario";
    }

}
