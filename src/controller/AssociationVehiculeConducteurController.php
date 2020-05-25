<?php

namespace App\Controller;

use App\Model\AssociationVehiculeConducteur;
use App\Model\Conducteur;
use App\Model\Vehicule;

class AssociationVehiculeConducteurController extends AbstractController {
    
    public static function index() { 
        echo 'Page index';
        
    }
    
    public static function create() {
        $listConducteurs = Conducteur::findAll();

        $listVehicules = Vehicule::findAll();        
        
        echo self::getTwig()->render('associationVehiculeConducteur/create.html', [
            'conducteurs' => $listConducteurs,
            'vehicules' => $listVehicules
            ]);
        
    }
    
    public static function new() { 
        $associationVehiculeConducteur = new AssociationVehiculeConducteur;
        $associationVehiculeConducteur->setIdConducteur($_POST['id_conducteur']);
        $associationVehiculeConducteur->setIdVehicule($_POST['id_vehicule']);
        // $vehicule->addOne();

        echo self::getTwig()->render('vehicule/new.html', ['vehicule' => $associationVehiculeConducteur]);

    }

}