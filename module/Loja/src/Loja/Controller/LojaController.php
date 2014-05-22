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
        $qb = $this->getEm()->createQueryBuilder('e');

        $qb->select('e')
                ->from('AdminProduto\Entity\Produto', 'e')
                ->where('e.grupo = 2');

        $list = $qb->getQuery()->getResult();

        return new ViewModel(array('data' => $list));
    }

    public function menuAction() {
        $qb = $this->getEm()->createQueryBuilder('e');

        $qb->select('e')
                ->from('AdminProduto\Entity\Produto', 'e')
                ->where('e.grupo = 1');

        $list = $qb->getQuery()->getResult();

        return new ViewModel(array('data' => $list));
    }

    public function galleryAction() {
        return new ViewModel();
    }

    public function reviewsAction() {
        $qb = $this->getEm()->createQueryBuilder('e');

        $qb->select('e')
                ->from('AdminProduto\Entity\Produto', 'e')
                ->where('e.grupo = 3');

        $list = $qb->getQuery()->getResult();
        return new ViewModel(array('data' => $list));
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
