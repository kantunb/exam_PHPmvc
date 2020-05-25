<?php

namespace App\Controller;

use App\Model\Vehicule;


class VehiculeController extends AbstractController {
    
    public static function index() { 
        echo 'Page index';
        
    }
    
    public static function create() { 
        
        echo self::getTwig()->render('vehicule/create.html');
        
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