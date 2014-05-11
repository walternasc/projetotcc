<?php

namespace AdminProduto\Form;

use Zend\Form\Form,
    Zend\Form\Element\Select;

class Produto extends Form {

    protected $grupo;

    public function __construct($name = null, array $grupo = null) {
        parent::__construct('produto');
        $this->grupo = $grupo;

        $this->setAttribute('method', 'post');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $descricao = new \Zend\Form\Element\Text("descricao");
        $descricao->setLabel("Descrição: ")
                ->setAttribute('placeholder', "Entre com a descrição do produto");
        $this->add($descricao);

        $preco = new \Zend\Form\Element\Text("preco");
        $preco->setLabel("Preço: ")
                ->setAttribute('placeholder', "Entre com o preço do produto");
        $this->add($preco);

        $grupo = new Select();
        $grupo->setLabel("Grupo: ")
                ->setName("grupo")
                ->setOptions(array('value_options' => $this->grupo));
        $this->add($grupo);

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn btn-success'
            )
        ));
    }

}
