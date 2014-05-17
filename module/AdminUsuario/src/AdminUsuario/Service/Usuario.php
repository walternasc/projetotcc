<?php

namespace AdminUsuario\Service;

use Doctrine\ORM\EntityManager;
use Admin\Service\AbstractService;
use Admin\Entity\Configurator;

class Usuario extends AbstractService {

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = "AdminUsuario\Entity\Usuario";
    }

    public function update(array $data) {
        $entity = $this->em->getReference($this->entity, $data['id']);
        if (empty($data['senha'])) {
            unset($data['senha']);
        }
        $entity = Configurator::configure($entity, $data);
        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }

}
