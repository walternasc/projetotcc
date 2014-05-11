<?php

//namespace (rota do arquivo)

namespace Loja\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LojaController extends AbstractActionController {

    public function indexAction() {
        return new ViewModel();
    }

    public function aboutAction() {
        return new ViewModel();
    }
    
    public function menuAction() {
        return new ViewModel();
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

}
