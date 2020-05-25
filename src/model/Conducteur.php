<?php

namespace App\Model;

use PDO;

class Conducteur extends AbstractModel {

    private $id_conducteur;
    private $prenom;
    private $nom;

    public function getId() : int {
        return $this->id_conducteur;
    }

    public function setId(int $id_conducteur) : self {
        $this->id_conducteur = $id_conducteur;
        return $this;
    }

    public function getPrenom() : string {
        return $this->prenom;
    }

    public function setPrenom(string $prenom) : self {
        $this->prenom = $prenom;
        return $this;
    }

    public function getNom() : string {
        return $this->nom;
    }

    public function setNom(string $nom) : self {
        $this->nom = $nom;
        return $this;
    }

    public function addOne() {
        $pdo = self::getPdo();

        $query = "INSERT INTO conducteur (prenom, nom) VALUES (:prenom, :nom)";
        
        $response = $pdo->prepare($query);
        $response->execute([
            'prenom' => $this->getPrenom(),
            'nom' => $this->getNom(),
        ]);

        return true;
    }

    public static function findAll() {
        $pdo = self::getPdo();

        $query = "SELECT * FROM conducteur";

        $response = $pdo->prepare($query);
        $response->execute();

        $data = $response->fetchAll();

        $dataAsObjets = [];

        foreach($data as $d){
            $dataAsObjets[] = self::toObject($d);
        }

        return $dataAsObjets;
    }

    public static function toObject($array){
        $conducteur = new Conducteur;
        $conducteur->setId($array['id_conducteur']);
        $conducteur->setPrenom($array['prenom']);
        $conducteur->setNom($array['nom']);

        return $conducteur;
    }




}