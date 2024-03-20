<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('admin', 'Admin::index');


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
$routes->get('admn/otobus', 'Admin::indexOtobus');
$routes->get('admn/otobusDuzenle(:num)', 'Admin::showOtobus/$1');
$routes->post('admn/otobus', 'Admin::create');
$routes->post('admn/otobusGuncele', 'Admin::create');
$routes->delete('admn/otobus/(:num)', 'Admin::deleteOtobus/$1');

// AracTanimlari/Sehir
$routes->get('admn/sehir', 'Sehir::index');
// AracTanimlari/Sefer

// Ödeme sayfası Kartlar
$routes->post('odeme', 'Odeme::index');

// KullaniciBilgi sayfası Kartlar
$routes->post('kullaniciBilgi', 'KullaniciBilgi::index');