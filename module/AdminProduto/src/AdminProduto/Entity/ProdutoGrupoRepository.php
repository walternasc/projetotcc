<?php

namespace AdminProduto\Entity;

use Doctrine\ORM\EntityRepository;

class ProdutoGrupoRepository extends EntityRepository {

    public function fetchPairs() {
        $entities = $this->findAll();

        $array = array();

        foreach ($entities as $entity) {
            $array[$entity->getId()] = $entity->getDescricao();
        }

        return $array;
    }

}
