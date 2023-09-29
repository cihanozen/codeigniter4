<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::index', ['filter' => 'NoLoginCheckFilter']);
$routes->get('/cikis', 'Auth::logout');

$routes->group('/', ['filter' => 'AuthCheckFilter'] , function($routes){

    $routes->get('{locale}/dashboard', 'Dashboard::index');

});