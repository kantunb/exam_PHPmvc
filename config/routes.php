<?php

use Bramus\Router\Router;

$router = new Router();
$router->setNamespace('App\Controller');

// Accueil route
$router->get('/', 'ConducteurController@create');

// Vehicule route

$router->get('/vehicule', 'VehiculeController@create');
$router->post('/vehicule', 'VehiculeController@new');
$router->get('/vehicule/(\d+)/edit', 'VehiculeController@edit');
$router->post('/vehicule/(\d+)/edit', 'VehiculeController@update');
$router->get('/vehicule/(\d+)/delete', 'VehiculeController@delete');


// Conducteur route

$router->get('/conducteur', 'ConducteurController@create');
$router->post('/conducteur', 'ConducteurController@new');
$router->get('/conducteur/(\d+)/edit', 'ConducteurController@edit');
$router->post('/conducteur/(\d+)/edit', 'ConducteurController@update');
$router->get('/conducteur/(\d+)/delete', 'ConducteurController@delete');


// Associate table route

$router->get('/association_vehicule_conducteur', 'AssociationVehiculeConducteurController@create');
$router->post('/association_vehicule_conducteur', 'AssociationVehiculeConducteurController@new');
$router->get('/association_vehicule_conducteur/(\d+)/edit', 'AssociationVehiculeConducteurController@edit');
$router->post('/association_vehicule_conducteur/(\d+)/edit', 'AssociationVehiculeConducteurController@update');
$router->get('/association_vehicule_conducteur/(\d+)/delete', 'AssociationVehiculeConducteurController@delete');


// Queries route

$router->get('/queries', 'QueriesController@index');



$router->run();

