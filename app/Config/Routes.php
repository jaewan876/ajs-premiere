<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'Login::index');
$routes->post('login', 'Login::handle');

$routes->get('signup', 'Register::index');
$routes->post('signup', 'Register::handle');

$routes->get('logout', function(){
	session()->destroy();
	return redirect()->to('login');
});

$routes->get('cart', 'Cart::index');
$routes->post('cart', 'Cart::store');
$routes->get('cart/item', 'Cart::get_item');

$routes->get('about-us', 'About::index');
$routes->get('contact-us', 'Contact::index');

$routes->group('products', static function ($routes) {
	$routes->get('/', 'Products::index');
	$routes->get('(:num)', 'Products::show/$1');
});

// $routes->get('products', 'Products::index');

$routes->get('services', 'Services::index');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'auth_admin'], static function ($routes) {
	$routes->get('/', 'Dashboard::index');

	$routes->get('orders', 'Orders::index');

	$routes->group('category', static function ($routes) {
		$routes->get('/', 'category::index');
		$routes->post('/', 'category::store');
		$routes->get('add', 'category::add');
		$routes->get('edit/(:num)', 'category::edit/$1');
		$routes->post('edit/(:num)', 'category::update/$1');
	});

	$routes->group('products', static function ($routes) {
		$routes->get('/', 'Products::index');
		$routes->post('/', 'Products::store');
		$routes->get('add', 'Products::add');
		$routes->get('edit/(:num)', 'Products::edit/$1');
		$routes->post('edit/(:num)', 'Products::update/$1');
	});

	$routes->get('services', 'Services::index');

	$routes->group('user', static function ($routes) {
		$routes->group('admin', static function ($routes) {
		    $routes->get('/', 'Users::index');
		    $routes->post('/', 'Users::store');
		    $routes->get('add', 'Users::add');
		    $routes->get('edit/(:num)', 'Users::edit/$1');
		    $routes->post('edit/(:num)', 'Users::update/$1');
	    });

		$routes->group('customers', static function ($routes) {
		    $routes->get('/', 'Customers::index');
		    $routes->post('/', 'Customers::store');
		    $routes->get('add', 'Customers::add');
		    $routes->get('edit/(:num)', 'Customers::edit/$1');
		    $routes->post('edit/(:num)', 'Customers::update/$1');
	    });
	});
});

$routes->group('account', ['namespace' => 'App\Controllers\Account', 'filter' => 'auth_customer'], static function ($routes) {
	$routes->get('/', 'Dashboard::index');

	$routes->group('profile', static function ($routes) {
		$routes->get('/', 'Profile::index');
		$routes->post('email/(:num)', 'Profile::update_email/$1');
		$routes->post('name', 'Profile::update_name');
		$routes->post('password', 'Profile::update_password');
	});

	$routes->get('orders', 'Orders::index');
	$routes->get('Settings', 'Settings::index');
});
