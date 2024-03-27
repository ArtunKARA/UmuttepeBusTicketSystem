<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('kvkkMetini', 'Home::kvkkMetini');
$routes->get('kvkkBasvurusu', 'Home::kvkkBasvurusu');
$routes->get('admn/dashboard', 'Admin::index');


//Kullanıcı Giriş Yap Kayıt Ol
$routes->get('kayitOl', 'Home::kayit');
$routes->post('login', 'Home::logedUser');
$routes->get('logout', 'Home::logout');
$routes->post('kayit', 'Kullanici::kayit');

// Kullanıcı Detay Sayfası
$routes->get('kullanici', 'Kullanici::index');
$routes->post('kullaniciGuncelle', 'Kullanici::guncelle');
$routes->get('kullaniciSefer', 'Kullanici::seferlerim');
$routes->post('biletAksiyon', 'Kullanici::biletAksiyon');
$routes->get('kullaniciKartlar', 'Kullanici::kartlarım');
$routes->post('kartDetay', 'Kullanici::kartDetay');
$routes->post('kartEkle', 'Kullanici::kartEkle');
$routes->post('kartGuncelle', 'Kullanici::kartGuncelle');
$routes->get('kullaniciKartlar/sil/(:num)', 'Kullanici::kartlartSil/$1');


//Güzergah
//$routes->get('guzergah', 'Guzergah::index');
$routes->post('guzergah', 'Guzergah::index');

//Güzergah Detay
$routes->post('guzergahdetayi', 'Guzergah::show');

// AracTanimlari/Otobus
$routes->get('admn/otobus', 'Admin::indexOtobus');
$routes->get('admn/otobusDuzenle(:num)', 'Admin::showOtobus/$1');
$routes->post('admn/otobus', 'Admin::create');
$routes->post('admn/otobusGuncelle', 'Admin::otobusGuncelle');
$routes->get('admn/otobus/sil/(:num)', 'Admin::otobusSil/$1');

// AracTanimlari/Sehir
$routes->get('admn/sehir', 'Sehir::index');


// AracTanimlari/Sefer
$routes->get('admn/sefer', 'Sefer::SeferDetay');
$routes->get('admn/seferDuzenle(:num)','Sefer::showSefer/$1');
$routes->post('admn/seferGuncelle','Sefer::SeferGuncelle');

//KullaniciTanimlari/Uye
$routes->get('admn/uye', 'AdminUye::IndexUye');

// Ödeme sayfası Kartlar
$routes->post('odeme', 'Odeme::index');

// KullaniciBilgi sayfası Kartlar
$routes->post('kullaniciBilgi', 'KullaniciBilgi::index');

// PNR API
$routes->get('pnrSorgu', 'pnrAPI::pnrSorgu');
$routes->get('pnrAPI', 'pnrAPI::pnrAPI');

