<?php

namespace App\Model;

use PDO;

class Vehicule extends AbstractModel
{

    private $idVehicule;
    private $marque;
    private $modele;
    private $couleur;
    private $immatriculation;

    /**
     * 
     * @return int
     */
    public function getId(): int
    {
        return $this->idVehicule;
    }

    /**
     *
     * @param int $idVehicule
     * @return self
     */
    public function setId(int $idVehicule): self
    {
        $this->idVehicule = $idVehicule;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getMarque(): string
    {
        return $this->marque;
    }

    /**
     *
     * @param string $marque
     * @return self
     */

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getModele(): string
    {
        return $this->modele;
    }

    /**
     *
     * @param string $modele
     * @return self
     */
    public function setModele(string $modele): self
    {
        $this->modele = $modele;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getCouleur(): string
    {
        return $this->couleur;
    }

    /**
     *
     * @param string $couleur
     * @return self
     */
    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getImmatriculation(): string
    {
        return $this->immatriculation;
    }

    /**
     *
     * @param string $immatriculation
     * @return self
     */
    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;
        return $this;
    }

    public function addOne()
    {
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

    public static function findAll()
    {
        $pdo = self::getPdo();

        $query = "SELECT * FROM vehicule";

        $response = $pdo->prepare($query);
        $response->execute();

        $data = $response->fetchAll();

        $dataAsObjets = [];

        foreach ($data as $d) {
            $dataAsObjets[] = self::toObject($d);
        }

        return $dataAsObjets;
    }

    public static function findOne($id)
    {

        $bdd = self::getPdo();

        $query = "SELECT * FROM vehicule WHERE (id_vehicule = :id_vehicule)";

        $response = $bdd->prepare($query);
        $response->execute([
            'id_vehicule' => $id
        ]);

        $data = $response->fetch();

        $dataAsObject = self::toObject($data);

        return $dataAsObject;
    }

    public static function deleteOne($id)
    {

        $pdo = self::getPdo();

        $query = "DELETE FROM vehicule WHERE (id_vehicule = :id_vehicule)";

        $response = $pdo->prepare($query);
        $response->execute([
            'id_vehicule' => $id
        ]);

        return true;
    }


    public static function toObject($array)
    {
        $vehicule = new Vehicule;
        $vehicule->setId($array['id_vehicule']);
        $vehicule->setMarque($array['marque']);
        $vehicule->setModele($array['modele']);
        $vehicule->setCouleur($array['couleur']);
        $vehicule->setImmatriculation($array['immatriculation']);

        return $vehicule;
    }

    public function update($id)
    {

        $pdo = self::getPdo();

        $query = "UPDATE vehicule SET marque = :marque, modele = :modele, couleur = :couleur, immatriculation = :immatriculation WHERE id_vehicule = :id";

        $response = $pdo->prepare($query);
        $response->execute([
            'marque' => $this->getMarque(),
            'modele' => $this->getModele(),
            'couleur' => $this->getCouleur(),
            'immatriculation' => $this->getImmatriculation(),
            'id' => $id
        ]);

        return true;
    }
}
