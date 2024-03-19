<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('admin', 'Admin::index');


//Kullanıcı Giriş Yap
$routes->post('login', 'Home::logedUser');
$routes->get('logout', 'Home::logout');

//Güzergah
//$routes->get('guzergah', 'Guzergah::index');
$routes->post('guzergah', 'Guzergah::index');

//Güzergah Detay
$routes->post('guzergahdetay', 'Guzergah::show');

// AracTanimlari/Otobus
$routes->get('admin/otobus', 'Otobus::index');
$routes->get('admin/otobus/(:num)', 'AracTanimlari\Otobus::show/$1');
$routes->post('admin/otobus', 'AracTanimlari\Otobus::create');
$routes->delete('admin/otobus/(:num)', 'AracTanimlari\Otobus::delete/$1');

// AracTanimlari/Sehir
$routes->get('admin/sehir', 'Sehir::index');
// AracTanimlari/Sefer

// Ödeme sayfası Kartlar
$routes->get('odeme', 'Odeme::index');