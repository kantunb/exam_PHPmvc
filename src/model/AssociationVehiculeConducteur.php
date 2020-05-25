<?php

namespace App\Model;

use PDO;

class AssociationVehiculeConducteur extends AbstractModel {

    private $id_association;
    private $id_vehicule;
    private $id_conducteur;

    public function getIdAssociatif() : int {
        return $this->id_association;
    }

    public function setIdAssociatif(int $id_association) : self {
        $this->id_association = $id_association;
        return $this;
    }

    public function getIdVehicule() : int {
        return $this->id_vehicule;
    }

    public function setIdVehicule(int $id_vehicule) : self {
        $this->id_vehicule = $id_vehicule;
        return $this;
    }

    public function getIdConducteur() : int {
        return $this->id_conducteur;
    }

    public function setIdConducteur(int $id_conducteur) : self {
        $this->id_conducteur = $id_conducteur;
        return $this;
    }

    // public function addOne() {
    //     $pdo = self::getPdo();

    //     $query = "INSERT INTO conducteur (prenom, nom) VALUES (:prenom, :nom)";
        
    //     $response = $pdo->prepare($query);
    //     $response->execute([
    //         'prenom' => $this->getPrenom(),
    //         'nom' => $this->getNom(),
    //     ]);

    //     return true;
    // }




}