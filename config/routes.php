<?php

use Bramus\Router\Router;

$router = new Router();
$router->setNamespace('App\Controller');

// Accueil route
$router->get('/', 'AppController@index');

// Vehicule route

$router->get('/vehicule', 'VehiculeController@index');
$router->get('/vehicule/create', 'VehiculeController@create');
$router->post('/vehicule', 'VehiculeController@new');

// Conducteur route

$router->get('/conducteur', 'ConducteurController@index');
$router->get('/conducteur/create', 'ConducteurController@create');
$router->post('/conducteur', 'ConducteurController@new');


$router->run();

