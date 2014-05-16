<?php

namespace AdminProduto\Service;

use Doctrine\ORM\EntityManager;
use Admin\Service\AbstractService;
use Admin\Entity\Configurator;

class Produto extends AbstractService {

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = "AdminProduto\Entity\Produto";
    }

    public function insert(array $data) {
        $entity = new $this->entity($data);

        $grupo = $this->em->getReference("AdminProduto\Entity\ProdutoGrupo", $data['grupo']);
        $entity->setGrupo($grupo);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }

    public function update(array $data) {
        $entity = $this->em->getReference($this->entity, $data['id']);
        $entity = Configurator::configure($entity, $data);

        $grupo = $this->em->getReference("AdminProduto\Entity\ProdutoGrupo", $data['grupo']);
        $entity->setGrupo($grupo);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }

}
