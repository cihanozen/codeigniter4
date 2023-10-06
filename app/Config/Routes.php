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
  
    // USER
    $routes->get('user-lists', 'User::userLists');
    $routes->get('user-add', 'User::userAdd');
    $routes->get('user-edit/(:any)', 'User::userEdit/$1');
    $routes->post('user-edit/update/(:any)', 'User::userUpdate/$1');
    $routes->post('user-add/save', 'User::userSave');
    $routes->get('user-lists/delete/(:any)', 'User::userDelete/$1');

    // GROUP
    $routes->get('user-group-lists', 'UserGroup::userGroupLists');
    $routes->get('user-group-permission', 'UserGroup::userGroupPermission');
    $routes->get('user-group-add', 'UserGroup::userGroupAdd');
    $routes->get('user-group-edit/(:any)', 'UserGroup::userGroupEdit/$1');
    $routes->post('user-group-edit/update/(:any)', 'UserGroup::userGroupUpdate/$1');
    $routes->post('user-group-add/save', 'UserGroup::userGroupSave');
    $routes->get('user-group-lists/delete/(:any)', 'UserGroup::userGroupDelete/$1');
  
});







