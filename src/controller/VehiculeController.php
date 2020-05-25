<?php

namespace App\Controller;

use App\Model\Vehicule;


class VehiculeController extends AbstractController
{

    public static function create()
    {

        $vehicules = Vehicule::findAll();

        echo self::getTwig()->render('vehicule/create.html', ['vehicules' => $vehicules]);
    }

    public static function new()
    {
        $vehicule = new Vehicule;
        $vehicule->setMarque($_POST['marque']);
        $vehicule->setModele($_POST['modele']);
        $vehicule->setCouleur($_POST['couleur']);
        $vehicule->setImmatriculation($_POST['immatriculation']);
        $vehicule->addOne();

        echo self::getTwig()->render('vehicule/new.html', ['vehicule' => $vehicule]);
    }

    public static function edit(int $id)
    {
        $vehicule = Vehicule::findOne($id);

        echo self::getTwig()->render('vehicule/edit.html', ['vehicule' => $vehicule]);
    }


    public static function update(int $id)
    {
        var_dump($_POST);
        $vehicule = new Vehicule;
        $vehicule->setMarque($_POST['marque']);
        $vehicule->setModele($_POST['modele']);
        $vehicule->setCouleur($_POST['couleur']);
        $vehicule->setImmatriculation($_POST['immatriculation']);
        $vehicule->update($id);

        header("Status: 301 Moved Permanently", false, 301);
        header("Location: " . BASE_PATH . "vehicule");
        exit();

    }

    public static function delete(int $id) {
        $vehicule = Vehicule::findOne($id);

        // TO DO : message de confirmation

        Vehicule::deleteOne($id);

        header("Status: 301 Moved Permanently", false, 301);
        header("Location: " . BASE_PATH . "vehicule");
        exit();
    }
}
