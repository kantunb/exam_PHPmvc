<?php

use Bramus\Router\Router;

$router = new Router();
$router->setNamespace('App\Controller');

// Accueil route
$router->get('/', 'AppController@index');

// Vehicule route

$router->get('/vehicule', 'VehiculeController@create');
$router->post('/vehicule', 'VehiculeController@new');
$router->get('/vehicule/(\d+)/edit', 'VehiculeController@edit');
$router->post('/vehicule/(\d+)/edit', 'VehiculeController@update');
$router->get('/vehicule/(\d+)/delete', 'VehiculeController@delete');


// Conducteur route

$router->get('/conducteur', 'ConducteurController@create');
$router->post('/conducteur', 'ConducteurController@new');

// Associate table route

$router->get('/association_vehicule_conducteur', 'AssociationVehiculeConducteurController@create');
$router->post('/association_vehicule_conducteur', 'AssociationVehiculeConducteurController@new');


$router->run();

