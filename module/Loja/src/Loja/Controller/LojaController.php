<?php

//namespace (rota do arquivo)

namespace Loja\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LojaController extends AbstractActionController {

    protected $em;

    public function indexAction() {
        return new ViewModel();
    }

    public function aboutAction() {
        return new ViewModel();
    }

    public function menuAction() {
        $list = $this->getEm()
                ->getRepository("AdminProduto\Entity\Produto")
                ->findAll();

        return new ViewModel(array('data' => $list));
    }

    public function galleryAction() {
        return new ViewModel();
    }

    public function reviewsAction() {
        return new ViewModel();
    }

    public function contactAction() {
        return new ViewModel();
    }

    /**
     * @return EntityManager
     */
    protected function getEm() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->em;
    }

}
