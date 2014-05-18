<?php

//namespace (rota do arquivo)

namespace AdminProduto\Controller;

use Admin\Controller\CrudController;
use Zend\View\Model\ViewModel;

class AdminProdutoController extends CrudController {

    public function __construct() {
        $this->entity = "AdminProduto\Entity\Produto";
        $this->service = "AdminProduto\Service\Produto";
        $this->form = "AdminProduto\Form\Produto";
        $this->controller = "adminproduto";
        $this->route = "produto";
    }

    public function newAction() {
        $form = $this->getServiceLocator()->get($this->form);
        $request = $this->getRequest();
        $File = $this->params()->fromFiles();
        if ($File) {
            $imgData = $_FILES["imagem"]["tmp_name"];
            $imgName = $_FILES["imagem"]["name"];
            $caminhoImg = $request->getServer('DOCUMENT_ROOT', false) . "/img/";
            move_uploaded_file($imgData, "$caminhoImg$imgName");
        }
        if ($request->isPost()) {
            $dados = $request->getPost();
            $dados->preco = str_replace(",", ".", str_replace(".", "", $dados->preco));
            $imagem = "../.." . substr("$caminhoImg", 26) . "$imgName";
            $form->setData($dados);
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->insert($request->getPost()->toArray(), $imagem);
                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }

        return new ViewModel(array('form' => $form));
    }

    public function editAction() {
        $form = $this->getServiceLocator()->get($this->form);
        $request = $this->getRequest();
        $File = $this->params()->fromFiles();
        if ($File) {
            $imgData = $_FILES["imagem"]["tmp_name"];
            $imgName = $_FILES["imagem"]["name"];
            $caminhoImg = $request->getServer('DOCUMENT_ROOT', false) . "/img/";
            move_uploaded_file($imgData, "$caminhoImg$imgName");
        }
        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id', 0));
        if ($this->params()->fromRoute('id', 0)) {
            $form->setData($entity->toArray());
        }
        if ($request->isPost()) {
            $dados = $request->getPost();
            $dados->preco = str_replace(",", ".", str_replace(".", "", $dados->preco));
            if ($imgName) {
                $imagem = "../.." . substr("$caminhoImg", 26) . "$imgName";
            } else {
                $imagem = null;
            }
            $form->setData($dados);
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->update($request->getPost()->toArray(), $imagem);
                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }
        return new ViewModel(array('form' => $form));
    }

}
