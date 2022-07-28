<?php

namespace Config;

use App\Controllers\UploadController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// $routes->get('/this', 'Home::coba');
// $routes->get('/test', 'TestController::index');
// $routes->get('/tests', 'Home::test');

// only allowed for unlogin users
$routes->group('', ['filter' => 'guest'], function($routes) {
    $routes->match(['get', 'post'], '/masuk', 'Auth\RegisterController::auth', ['as' => 'reg']);
    $routes->match(['get', 'post'], '/login', 'Auth\LoginController::auth', ['as' => 'login']);
});

// pages with authenticate protection
$routes->group('', ['filter' => 'auth'], function($routes) {
    // data vaksin
    $routes->get('/employee', 'EmployeeController::index', ['as' => 'employees']);
    $routes->post('/employee/add', 'EmployeeController::add');
    $routes->get('/employee/edit/(:any)', 'EmployeeController::edit/$1');
    $routes->post('/employee/update/(:any)', 'EmployeeController::update/$1');
    $routes->post('/employee/hapus/(:any)', 'EmployeeController::hapus/$1');

    // data produk
    $routes->get('/product', 'ProductController::index', ['as' => 'products']);
    $routes->get('/product/create', 'ProductController::create');
    $routes->post('/product', 'ProductController::store');
    $routes->get('/product/(.*)/edit', 'ProductController::edit/$1');
    $routes->post('/product/(.*)', 'ProductController::update/$1');
    $routes->get('/product/(.*)/delete', 'ProductController::destroy/$1');

    $routes->get('/user', 'UserController::index', ['as' => 'users']);

    $routes->get('/student', 'StudentController::index', ['as' => 'students']);
    $routes->get('/student/create', 'StudentController::create');
    $routes->post('/student', 'StudentController::store');
    $routes->get('/student/(.*)/edit', 'StudentController::edit/$1');
    $routes->post('/student/(.*)', 'StudentController::update/$1');
    $routes->get('/student/(.*)/delete', 'StudentController::destroy/$1');

    $routes->get('/admin', 'AdminController::index', ['as' => 'admins']);
    $routes->get('/admin/create', 'AdminController::create');
    $routes->post('/admin', 'AdminController::store');
    $routes->get('/admin/(.*)/edit', 'AdminController::edit/$1');
    $routes->post('/admin/(.*)', 'AdminController::update/$1');
    $routes->get('/admin/(.*)/delete', 'AdminController::destroy/$1');

    // ajax validation 
    $routes->get('/contact', 'ContactController::index', ['as' => 'contacts']);
    $routes->get('/contact/create', 'ContactController::create');
    $routes->post('/contact', 'ContactController::store');
    $routes->get('/contact/(.*)/edit', 'ContactController::edit/$1');
    $routes->post('/contact/(.*)', 'ContactController::update/$1');
    $routes->get('/contact/(.*)/delete', 'ContactController::destroy/$1');

    // $routes->resource('students', ['StudentController']);

    // uploading image in folder img/uploads (folder public)
    $routes->get('/files', 'UploadController::index', ['as' => 'files']);
    $routes->get('/files/create', 'UploadController::create');
    $routes->post('/files', 'UploadController::store');
    $routes->get('/files/(.*)/download', 'UploadController::download/$1');

    // logout user
    $routes->get('/logout', 'Auth\LoginController::logout', ['as' => 'logout']);
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
