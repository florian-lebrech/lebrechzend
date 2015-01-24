<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Serie\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Serie\Model\Serie;         
use Serie\Form\SerieForm;     
use Zend\Json\Json as Json;


class SerieController extends AbstractActionController {

    protected $serieTable;

    public function indexAction() {
        return new ViewModel(array(
            'series' => $this->getSerieTable()->fetchAll(),
        ));
        /*$data = array(
            'series' => $this->getSerieTable()->fetchAll());
         var_dump($data);*/
    }

    public function addAction() {
        $form = new SerieForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $serie = new Serie();
            $form->setInputFilter($serie->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $serie->exchangeArray($form->getData());
                $this->getSerieTable()->saveSerie($serie);

                // Redirect to list of series
                return $this->redirect()->toRoute('serie');
            }
        }
        return array('form' => $form);
    }

    public function editAction() {
        $idSerie = (int) $this->params()->fromRoute('idSerie', 0);
        if (!$idSerie) {
            return $this->redirect()->toRoute('serie', array(
                        'action' => 'add'
            ));
        }
        try {
            $serie = $this->getSerieTable()->getSerie($idSerie);
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute('serie', array(
                        'action' => 'index'
            ));
        }

        $form = new SerieForm();
        $form->bind($serie);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($serie->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getSerieTable()->saveSerie($serie);

                // Redirect to list of series
                return $this->redirect()->toRoute('serie');
            }
        }

        return array(
            'idSerie' => $idSerie,
            'form' => $form,
        );
    }

    public function deleteAction() {
        $idSerie = (int) $this->params()->fromRoute('idSerie', 0);
        if (!$idSerie) {
            return $this->redirect()->toRoute('serie');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $idSerie = (int) $request->getPost('idSerie');
                $this->getSerieTable()->deleteSerie($idSerie);
            }

            // Redirect to list of series
            return $this->redirect()->toRoute('serie');
        }

        return array(
            'idSerie' => $idSerie,
            'serie' => $this->getSerieTable()->getSerie($idSerie)
        );
    }

    public function getSerieTable() {
        if (!$this->serieTable) {
            $sm = $this->getServiceLocator();
            $this->serieTable = $sm->get('Serie\Model\SerieTable');
        }
        return $this->serieTable;
    }
    
     public function genererJsonAction(){
       
       
         $json =  Json::encode( $this->getSerieTable()->fetchAll());
        echo $json;
        exit(0);
       
}
    public function indexjsonAction(){
           
         return new ViewModel(array(
           
        ));
        
        
    }
}