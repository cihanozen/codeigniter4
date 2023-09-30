<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


 $routes->get('/', 'Auth::index', ['filter' => 'NoLoginCheckFilter']);
$routes->get('/cikis', 'Auth::logout');

$routes->group('/', ['filter' => 'AuthCheckFilter'] , function($routes){

    $routes->get('{locale}', 'Dashboard::index');
    $routes->get('{locale}/dashboard', 'Dashboard::index');
   
    $routes->group('tr', ['filter' => 'AuthCheckFilter'] , function($routes){

        $routes->get('kullanici-listesi', 'User::userLists');
    
    });

    $routes->group('en', ['filter' => 'AuthCheckFilter'] , function($routes){

        $routes->get('user-lists', 'User::userLists');
    
    });

});

