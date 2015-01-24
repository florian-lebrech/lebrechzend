<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Serie\Model;

use Zend\Db\TableGateway\TableGateway;

class SerieTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll() {

        $resultSet = $this->tableGateway->select(array('username'=>$_SESSION['zf_tutorial']['storage']));
        return $resultSet;
    }

    public function getSerie($idSerie) {
        $idSerie = (int) $idSerie;
        $rowset = $this->tableGateway->select(array('idSerie' => $idSerie));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $idSerie");
        }
        return $row;
    }

    public function saveSerie(Serie $serie) {
        $data = array(
            'nomSerie' => $serie->nomSerie,
            'imageSerie' => $serie->imageSerie,
            'descriptionSerie' => $serie->descriptionSerie,
            'saison' => $serie->saison,
            'episode' => $serie->episode,
            'username' => $serie->username,
        );

        $idSerie = (int) $serie->idSerie;
        if ($idSerie == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getSerie($idSerie)) {
                $this->tableGateway->update($data, array('idSerie' => $idSerie));
            } else {
                throw new \Exception('Serie id does not exist');
            }
        }
    }

    public function deleteSerie($idSerie) {
        $this->tableGateway->delete(array('idSerie' => (int) $idSerie));
    }

}
