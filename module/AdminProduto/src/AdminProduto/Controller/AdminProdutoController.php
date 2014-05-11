<?php

//namespace (rota do arquivo)

namespace AdminProduto\Controller;

use Admin\Controller\CrudController;

class AdminProdutoController extends CrudController {

    public function __construct() {
        $this->entity = "AdminProduto\Entity\Produto";
        $this->service = "AdminProduto\Service\Produto";
        $this->controller = "adminproduto";
        $this->route = "produto";
    }

}
