<?php

namespace App\Model;

use PDO;

class AssociationVehiculeConducteur extends AbstractModel {

    private $idAssociation;
    private $idVehicule;
    private $idConducteur;

    public function getIdAssociatif() : int {
        return $this->idAssociation;
    }

    public function setIdAssociatif(int $idAssociation) : self {
        $this->idAssociation = $idAssociation;
        return $this;
    }

    public function getIdVehicule() : int {
        return $this->idVehicule;
    }

    public function setIdVehicule(int $idVehicule) : self {
        $this->idVehicule = $idVehicule;
        return $this;
    }

    public function getIdConducteur() : int {
        return $this->idConducteur;
    }

    public function setIdConducteur(int $idConducteur) : self {
        $this->idConducteur = $idConducteur;
        return $this;
    }

    public function addOne() {
        $pdo = self::getPdo();

        $query = "INSERT INTO association_vehicule_conducteur (id_vehicule, id_conducteur) VALUES (:id_vehicule, :id_conducteur)";
        
        $response = $pdo->prepare($query);
        $response->execute([
            'id_vehicule' => $this->getIdVehicule(),
            'id_conducteur' => $this->getIdConducteur(),
        ]);

        return true;
    }




}