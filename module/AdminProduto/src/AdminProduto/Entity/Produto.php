<?php

namespace AdminProduto\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\StdLib\Hydrator;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity
 */
class Produto {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="product_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", nullable=true)
     */
    private $descricao;

    /**
     * @var float
     *
     * @ORM\Column(name="costprice", type="decimal", nullable=true)
     */
    private $preco;

    /**
     * @var \ProductGroup
     *
     * @ORM\ManyToOne(targetEntity="AdminProduto\Entity\ProdutoGrupo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_group_id", referencedColumnName="id")
     * })
     */
    private $grupo;

    public function __construct(array $options = array()) {
        (new Hydrator\ClassMethods)->hydrate($options, $this);
    }

    public function getId() {
        return $this->id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getGrupo() {
        return $this->grupo;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function setGrupo($grupo) {
        $this->grupo = $grupo;
    }

    public function toArray() {
        return (new Hydrator\ClassMethods)->extract($this);
    }

}