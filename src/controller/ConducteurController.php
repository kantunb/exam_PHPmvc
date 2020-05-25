<?php

namespace App\Controller;

use App\Model\Conducteur;


class ConducteurController extends AbstractController {
    
    public static function index() { 
        echo 'Page index';
        
    }
    
    public static function create() {

        $conducteurs = Conducteur::findAll();
        
        echo self::getTwig()->render('conducteur/create.html', ['conducteurs' => $conducteurs]);
        
    }
    
    public static function new() { 
        $conducteur = new Conducteur;
        $conducteur->setPrenom($_POST['prenom']);
        $conducteur->setNom($_POST['nom']);
        $conducteur->addOne();


        echo self::getTwig()->render('conducteur/new.html', ['conducteur' => $conducteur]);

    }

}