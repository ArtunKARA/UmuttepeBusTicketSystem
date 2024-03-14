<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //User Routes
 $routes->get('/', 'Home::index');

 //Admin Routes
$routes->get('admin', 'Admin::index');
$routes->get('admin/otobus', 'Otobus::index');

$routes->get('admin/otobus/(:num)', 'Otobus::show/$1');
$routes->post('admin/otobus', 'Otobus::create');
$routes->get('admin/otobus/delete/(:num)', 'Otobus::deleteOtobus/$1');