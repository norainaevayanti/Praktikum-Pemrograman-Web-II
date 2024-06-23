<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'Buku::login');
$routes->get('home', 'Buku::index'); 
$routes->get('/register', 'Register::index');
$routes->post('/register/process', 'Register::process');
$routes->get('/login', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');
$routes->get('/buku/create', 'Buku::create');
$routes->post('buku/store', 'Buku::store');
$routes->post('buku/update/', 'Buku::update', ['filter' => 'auth']);
$routes->get('buku/edit/', 'Buku::edit', ['filter' => 'auth']);
$routes->get('buku/delete/', 'Buku::delete', ['filter' => 'auth']);