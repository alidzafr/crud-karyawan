<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Karyawan::index');
$routes->get('/create', 'Karyawan::create');
$routes->post('/karyawan/store', 'Karyawan::store');
$routes->get('/karyawan/(:num)', 'Karyawan::detail/$1');
$routes->delete('/karyawan/del/(:num)', 'Karyawan::delete/$1');
$routes->get('/karyawan/edit/(:any)', 'Karyawan::edit/$1');
$routes->put('/karyawan/update/(:num)', 'Karyawan::update/$1');
