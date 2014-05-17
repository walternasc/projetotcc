<?php

namespace AdminUsuario\Form;

use Zend\Form\Form;

class Usuario extends Form {

    public function __construct($name = null) {
        parent::__construct('usuario');

        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype', 'multipart/form-data');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $nome = new \Zend\Form\Element\Text("nome");
        $nome->setLabel("Nome: ")
                ->setAttribute('id', 'nome')
                ->setAttribute('required', 'true')
                ->setAttribute('placeholder', "Entre com o nome do usuario");
        $this->add($nome);

        $email = new \Zend\Form\Element\Text("email");
        $email->setLabel("E-Mail:")
                ->setAttribute('placeholder', "Entre com seu email")
                ->setAttribute('required', 'true')
                ->setAttribute('id', 'email');
        $this->add($email);

        $senha = new \Zend\Form\Element\Password("senha");
        $senha->setLabel("Senha:")
                ->setAttribute('placeholder', "Entre com a senha")
                ->setAttribute('id', 'senha');
        $this->add($senha);

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
