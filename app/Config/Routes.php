<?php

namespace Config;

use CodeIgniter\Config\Services;

$routes = Services::routes();

// ========================================
// LOAD SYSTEM ROUTES
// ========================================
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

// ========================================
// ROUTER SETUP
// ========================================
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true); // boleh true sesuai modul

// ========================================
// ROUTES KHUSUS APLIKASI
// ========================================

// HOME
$routes->get('/', 'Home::index');

// ==========================
// BOOK ROUTES (CRUD)
// ==========================
$routes->get('/books', 'BookController::index');
$routes->get('/books/create', 'BookController::create');
$routes->post('/books/store', 'BookController::store');
$routes->get('/books/edit/(:num)', 'BookController::edit/$1');
$routes->post('/books/update/(:num)', 'BookController::update/$1');
$routes->get('/books/delete/(:num)', 'BookController::delete/$1');

// ==========================
// MEMBER ROUTES (CRUD)
// ==========================
$routes->get('/members', 'MemberController::index');
$routes->get('/members/create', 'MemberController::create');
$routes->post('/members/store', 'MemberController::store');
$routes->get('/members/edit/(:num)', 'MemberController::edit/$1');
$routes->post('/members/update/(:num)', 'MemberController::update/$1');
$routes->get('/members/delete/(:num)', 'MemberController::delete/$1');

// ========================================
// LOAD ENVIRONMENT ROUTES
// ========================================
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}