<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'Login::index');

$routes->get('register', 'Register::index');

$routes->get('about-us', 'About::index');

$routes->get('contact-us', 'Contact::index');

$routes->get('products', 'Products::index');

$routes->get('services', 'Services::index');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], static function ($routes) {
	$routes->get('/', 'Dashboard::index');

	$routes->get('products', 'Products::index');
	$routes->post('products', 'Products::store');
	$routes->get('products/add', 'Products::add');
	$routes->get('products/edit/(:num)', 'Products::edit/$1');
	$routes->post('products/edit/(:num)', 'Products::update/$1');

	$routes->get('category', 'category::index');
	$routes->post('category', 'category::store');
	$routes->get('category/add', 'category::add');
	$routes->get('category/edit/(:num)', 'category::edit/$1');
	$routes->post('category/edit/(:num)', 'category::update/$1');

	$routes->get('services', 'Services::index');

	$routes->group('user', static function ($routes) {
	    $routes->get('admin', 'Users::index');
	    $routes->post('admin', 'Users::store');
	    $routes->get('admin/add', 'Users::add');
	    $routes->get('admin/edit/(:num)', 'Users::edit/$1');
	    $routes->post('admin/edit/(:num)', 'Users::update/$1');

	    $routes->get('customers', 'Customers::index');
	    $routes->post('customers', 'Customers::store');
	    $routes->get('customers/add', 'Customers::add');
	    $routes->get('customers/edit/(:num)', 'Customers::edit/$1');
	    $routes->post('customers/edit/(:num)', 'Customers::update/$1');
	});
});
