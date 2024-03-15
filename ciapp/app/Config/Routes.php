<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('admin', 'Admin::index');


//Güzergah
$routes->get('guzergah', 'Guzergah::index');
$routes->post('guzergah', 'Guzergah::index');

// AracTanimlari/Otobus
$routes->get('admin/otobus', 'Otobus::index');
$routes->get('admin/otobus/(:num)', 'AracTanimlari\Otobus::show/$1');
$routes->post('admin/otobus', 'AracTanimlari\Otobus::create');
$routes->delete('admin/otobus/(:num)', 'AracTanimlari\Otobus::delete/$1');

// AracTanimlari/Sehir
$routes->get('admin/sehir', 'Sehir::index');
// AracTanimlari/Sefer