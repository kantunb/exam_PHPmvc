<?php

namespace App\Model;

use PDO;

class Vehicule extends AbstractModel {

    private $id_vehicule;
    private $marque;
    private $modele;
    private $couleur;
    private $immatriculation;

    public function getId() : int {
        return $this->id_vehicule;
    }

    public function setId(int $id_vehicule) : self {
        $this->id_vehicule = $id_vehicule;
        return $this;
    }

    public function getMarque() : string {
        return $this->marque;
    }

    public function setMarque(string $marque) : self {
        $this->marque = $marque;
        return $this;
    }

    public function getModele() : string {
        return $this->modele;
    }

    public function setModele(string $modele) : self {
        $this->modele = $modele;
        return $this;
    }

    public function getCouleur() : string {
        return $this->couleur;
    }

    public function setCouleur(string $couleur) : self {
        $this->couleur = $couleur;
        return $this;
    }

    public function getImmatriculation() : string {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation) : self {
        $this->immatriculation = $immatriculation;
        return $this;
    }

    public function addOne() {
        $pdo = self::getPdo();

        $query = "INSERT INTO vehicule (marque, modele, couleur, immatriculation) VALUES (:marque, :modele, :couleur, :immatriculation)";
        
        $response = $pdo->prepare($query);
        $response->execute([
            'marque' => $this->getMarque(),
            'modele' => $this->getModele(),
            'couleur' => $this->getCouleur(),
            'immatriculation' => $this->getImmatriculation()
        ]);

        return true;
    }




}