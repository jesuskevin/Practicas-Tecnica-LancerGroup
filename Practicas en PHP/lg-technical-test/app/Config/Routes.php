<?php

namespace Config;

use App\Controllers\Author;
use App\Controllers\Book;
use App\Controllers\Home;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', [Home::class, 'index'], ['as' => 'index']);

$routes->get('/autores', [Author::class, 'index'], ['as' => 'authors.index']);
$routes->get('/autores/crear', [Author::class, 'create'], ['as' => 'authors.create']);
$routes->post('/autores/guardar', [Author::class, 'store'], ['as' => 'authors.store']);
$routes->get('/autores/(:num)/detalles', [Author::class, 'show/$1'], ['as' => 'authors.show']);
$routes->get('/autores/(:num)/editar', [Author::class, 'edit/$1'], ['as' => 'authors.edit']);
$routes->post('/autores/(:num)/actualizar', [Author::class, 'update/$1'], ['as' => 'authors.update']);
$routes->post('/autores/(:num)/eliminar', [Author::class, 'delete/$1'], ['as' => 'authors.delete']);

$routes->get('/libros', [Book::class, 'index'], ['as' => 'books.index']);
$routes->get('/libros/crear', [Book::class, 'create'], ['as' => 'books.create']);
$routes->post('/libros/guardar', [Book::class, 'store'], ['as' => 'books.store']);
$routes->get('/libros/(:num)/detalles', [Book::class, 'show/$1'], ['as' => 'books.show']);

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
