<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Laboratorio');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

// Rutas principales
$routes->get('/', 'Laboratorio::index');
$routes->get('laboratorio', 'Laboratorio::index');
$routes->get('laboratorio/create', 'Laboratorio::create');
$routes->post('laboratorio/store', 'Laboratorio::store');
$routes->get('laboratorio/edit/(:num)', 'Laboratorio::edit/$1');
$routes->post('laboratorio/update/(:num)', 'Laboratorio::update/$1');
$routes->delete('laboratorio/delete/(:num)', 'Laboratorio::delete/$1');

// Rutas para Docentes
$routes->get('docente', 'Docente::index');
$routes->get('docente/create', 'Docente::create');
$routes->post('docente/store', 'Docente::store');
$routes->get('docente/edit/(:num)', 'Docente::edit/$1');
$routes->post('docente/update/(:num)', 'Docente::update/$1');
$routes->delete('docente/delete/(:num)', 'Docente::delete/$1');

// Rutas para Reservas
$routes->get('reserva', 'Reserva::index');
$routes->get('reserva/delete/(:num)', 'Reserva::delete/$1');