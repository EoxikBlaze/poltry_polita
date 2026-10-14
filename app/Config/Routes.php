<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Login awal
$routes->get('/', 'Login::index');
$routes->get('login', 'Login::index');
$routes->post('login/cek_login', 'Login::cek_login');
$routes->get('login/cek_login', 'Login::index');
$routes->get('login/logout', 'Login::logout');

// Rute untuk halaman utama
$routes->get('home', 'Home::index');

// Rute untuk dashboard
$routes->get('dashboard', 'Dashboard::index');

// Rute untuk halaman monitoring
$routes->get('monitoring', 'Monitoring::index');

// Rute untuk halaman kandang
$routes->get('kandang', 'Kandang::index');
$routes->get('kandang/create', 'Kandang::create');
$routes->post('kandang/add', 'Kandang::add');
$routes->post('kandang/update/(:any)', 'Kandang::update/$1');
$routes->get('kandang/edit/(:any)', 'Kandang::edit/$1');
$routes->get('kandang/delete/(:any)', 'Kandang::delete/$1');

// Rute untuk halaman about
$routes->get('about', 'About::index');

// Rute untuk halaman user
$routes->get('user', 'User::index');
$routes->get('user/create', 'User::create');
$routes->post('user/add', 'User::add');
$routes->post('user/update/(:any)', 'User::update/$1');
$routes->get('user/edit/(:any)', 'User::edit/$1');
$routes->get('user/delete/(:any)', 'User::delete/$1');

// Rute untuk halaman pekerja
$routes->get('pekerja', 'Pekerja::index');
$routes->get('pekerja/create', 'Pekerja::create');
$routes->post('pekerja/add', 'Pekerja::add');
$routes->post('pekerja/update/(:any)', 'Pekerja::update/$1');
$routes->get('pekerja/edit/(:any)', 'Pekerja::edit/$1');
$routes->get('pekerja/delete/(:any)', 'Pekerja::delete/$1');

// Rute untuk halaman siklus ayam
$routes->get('siklus_ayam', 'Siklus_ayam::index');
$routes->get('siklus_ayam/create', 'Siklus_ayam::create');
$routes->post('siklus_ayam/add', 'Siklus_ayam::add');
$routes->post('siklus_ayam/update', 'Siklus_ayam::update');
$routes->get('siklus_ayam/edit/(:any)', 'Siklus_ayam::edit/$1');
$routes->get('siklus_ayam/delete/(:any)', 'Siklus_ayam::delete/$1');

// Rute untuk halaman Pencatatan Harian
$routes->get('pencatatan_harian', 'Pencatatan_harian::index');
$routes->get('pencatatan_harian/create', 'Pencatatan_harian::create');
$routes->post('pencatatan_harian/add', 'Pencatatan_harian::add');
$routes->post('pencatatan_harian/update/(:any)', 'Pencatatan_harian::update/$1');
$routes->get('pencatatan_harian/edit/(:any)', 'Pencatatan_harian::edit/$1');
$routes->get('pencatatan_harian/delete/(:any)', 'Pencatatan_harian::delete/$1');
