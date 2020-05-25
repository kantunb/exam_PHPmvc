<?php

namespace App\Controller;

use App\Model\Vehicule;


class VehiculeController extends AbstractController {
    
    public static function create() { 

        $vehicules = Vehicule::findAll();
        
        echo self::getTwig()->render('vehicule/create.html', ['vehicules' => $vehicules]);        
    }
    
    public static function new() { 
        $vehicule = new Vehicule;
        $vehicule->setMarque($_POST['marque']);
        $vehicule->setModele($_POST['modele']);
        $vehicule->setCouleur($_POST['couleur']);
        $vehicule->setImmatriculation($_POST['immatriculation']);
        $vehicule->addOne();

        echo self::getTwig()->render('vehicule/new.html', ['vehicule' => $vehicule]);

    }

}