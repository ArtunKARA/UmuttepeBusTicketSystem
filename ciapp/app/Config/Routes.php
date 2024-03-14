<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('guzergah', 'Guzergah::index');
$routes->get('admin', 'Admin::index');






