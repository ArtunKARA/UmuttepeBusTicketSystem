<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('adm', 'Admin::index');


//Kullanıcı Giriş Yap
$routes->get('kayitOl', 'Home::kayit');
$routes->post('login', 'Home::logedUser');
$routes->get('logout', 'Home::logout');

// Kullanıcı Detay Sayfası
$routes->get('kullanici', 'Kullanici::index');
$routes->post('kullaniciGuncelle', 'Kullanici::guncelle');


//Güzergah
//$routes->get('guzergah', 'Guzergah::index');
$routes->post('guzergah', 'Guzergah::index');

//Güzergah Detay
$routes->post('guzergahdetayi', 'Guzergah::show');

// AracTanimlari/Otobus
$routes->get('admin/otobus', 'Otobus::index');
$routes->get('admin/otobus/(:num)', 'AracTanimlari\Otobus::show/$1');
$routes->post('admin/otobus', 'AracTanimlari\Otobus::create');
$routes->delete('admin/otobus/(:num)', 'AracTanimlari\Otobus::delete/$1');

// AracTanimlari/Sehir
$routes->get('admin/sehir', 'Sehir::index');
// AracTanimlari/Sefer

// Ödeme sayfası Kartlar
$routes->post('odeme', 'Odeme::index');