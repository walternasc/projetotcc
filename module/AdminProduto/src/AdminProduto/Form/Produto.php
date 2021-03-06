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
        $this->setAttribute('enctype', 'multipart/form-data');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $descricao = new \Zend\Form\Element\Text("descricao");
        $descricao->setLabel("Descrição: ")
                ->setAttribute('id', 'descricao')
                ->setAttribute('required', 'true')
                ->setAttribute('placeholder', "Entre com a descrição do produto");
        $this->add($descricao);

        $preco = new \Zend\Form\Element\Text("preco");
        $preco->setLabel("Preço(R$): ")
                ->setAttribute('placeholder', "Entre com o preço do produto")
                ->setAttribute('required', 'true')
                ->setAttribute('id', 'money')
                ->setAttribute('maxLength', 11);
        $this->add($preco);

        $grupo = new Select();
        $grupo->setLabel("Grupo: ")
                ->setName("grupo")
                ->setAttribute('id', 'grupo')
                ->setOptions(array('value_options' => $this->grupo));
        $this->add($grupo);

        $comentario = new \Zend\Form\Element\Textarea("comentario");
        $comentario->setLabel('Comentario:')
                ->setAttribute('required', 'true')
                ->setAttribute('id', 'comentario')
                ->setAttribute('rows', 3)
                ->setAttribute('cols', 10)
                ->setAttribute('placeholder', "Comentarios sobre o Produto");
        $this->add($comentario);

        $imagem = new \Zend\Form\Element\File("imagem");
        $imagem->setLabel('Imagem:')
                ->setAttribute('id', 'imagem');
        $this->add($imagem);

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn btn-success btn-block'
            )
        ));
    }

}
