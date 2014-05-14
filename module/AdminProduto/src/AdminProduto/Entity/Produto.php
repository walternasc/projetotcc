<?php

namespace AdminProduto\Entity;

use Doctrine\ORM\Mapping as ORM;
use Admin\Entity\Configurator;

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

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", nullable=true)
     */
    private $comentario;

    public function __construct($options = null) {
        Configurator::configure($this, $options);
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

    public function getComentario() {
        return $this->comentario;
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

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    public function toArray() {
        return array(
            'id' => $this->id,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'comentario' => $this->comentario,
            'grupo' => $this->grupo->getId()
        );
    }

}
