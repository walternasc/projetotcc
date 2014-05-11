<?php

namespace AdminProduto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductGroup
 *
 * @ORM\Entity
 * @ORM\Table(name="product_group")
 * @ORM\Entity(repositoryClass="AdminProduto\Entity\ProdutoGrupoRepository")
 */
class ProdutoGrupo {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="product_group_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", nullable=false)
     */
    private $descricao;

    public function getId() {
        return $this->id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

}
