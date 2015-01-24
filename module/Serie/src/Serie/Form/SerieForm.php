<?php

namespace Serie\Form;

use Zend\Form\Form;

class SerieForm extends Form {

    public function __construct($name = null) {
        // we want to ignore the name passed
        parent::__construct('serie');

        $this->add(array(
            'name' => 'idSerie',
            'type' => 'Hidden',
        ));
        
                $this->add(array(
            'name' => 'username',
            'type' => 'Hidden',
            'options' => array(
                'label' => 'username',
            ),
        ));
        
        $this->add(array(
            'name' => 'nomSerie',
            'type' => 'Text',
            'options' => array(
                'label' => 'Title',
            ),
        ));
        $this->add(array(
            'name' => 'imageSerie',
            'type' => 'Text',
            'options' => array(
                'label' => 'Image',
            ),
        ));
        $this->add(array(
            'name' => 'descriptionSerie',
            'type' => 'Text',
            'options' => array(
                'label' => 'description',
            ),
        ));
        $this->add(array(
            'name' => 'saison',
            'type' => 'number',
            'options' => array(
                'label' => 'saison',
            ),
        ));
        $this->add(array(
            'name' => 'episode',
            'type' => 'number',
            'options' => array(
                'label' => 'episode',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'idSerie' => 'submitbutton',
            ),
        ));
        
        $this->get('username')->setValue($_SESSION['zf_tutorial']['storage']);
    }

}
