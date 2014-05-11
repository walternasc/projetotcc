<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

abstract class CrudController extends AbstractActionController {

    /**
     *
     * @var EntityManager
     */
    protected $em;
    protected $entity;
    protected $service;
    protected $route;
    protected $controller;

    public function indexAction() {

        $list = $this->getEm()
                ->getRepository($this->entity)
                ->findAll();

        return new ViewModel(array('data' => $list));
    }

    public function deleteAction() {
        $service = $this->getServiceLocator()->get($this->service);
        if ($service->delete($this->params()->fromRoute('id', 0))) {
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
        }
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
