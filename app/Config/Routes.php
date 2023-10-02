<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::index', ['filter' => 'NoLoginCheckFilter']);

$routes->post('/auth-control', 'Auth::control');
$routes->get('/cikis', 'Auth::logout');

$routes->group('{locale}', ['filter' => 'AuthCheckFilter'] , function($routes){

    $routes->get('dashboard', 'Dashboard::index');

    $routes->get('user-lists', 'User::userLists');
    $routes->get('user-add', 'User::userAdd');
    $routes->get('user-edit/(:any)', 'User::userEdit/$1');
    $routes->post('user-edit/update/(:any)', 'User::userUpdate/$1');
    $routes->post('user-add/save', 'User::userSave');
    $routes->get('user-lists/delete/(:any)', 'User::userDelete/$1');
  
});







