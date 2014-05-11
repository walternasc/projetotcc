<?php

namespace AdminProduto\Service;

use Doctrine\ORM\EntityManager;
use Admin\Service\AbstractService;

class Produto extends AbstractService {

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = "AdminProduto\Entity\Produto";
    }

}
