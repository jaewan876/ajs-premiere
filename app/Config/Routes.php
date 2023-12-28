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

$routes->group('cart', static function ($routes) {
	$routes->get('/', 'Cart::index');
	$routes->post('/', 'Cart::store');
	$routes->get('items', 'Cart::get_items');
	$routes->post('update/(:num)', 'Cart::update/$1');
	$routes->post('update_payment/(:num)', 'Cart::update_payment/$1');
	$routes->post('remove/(:num)', 'Cart::remove/$1');
});

$routes->group('checkout', static function ($routes) {
	$routes->get('/', 'Checkout::index');
	$routes->post('/', 'Checkout::create_order');
});

$routes->get('about-us', 'About::index');
$routes->get('contact-us', 'Contact::index');

$routes->group('products', static function ($routes) {
	$routes->get('/', 'Products::index');
	$routes->get('(:num)/(:segment)', 'Products::show/$1/$2');
});

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'auth_admin'], static function ($routes) {
	$routes->get('/', 'Dashboard::index');

	$routes->group('orders', static function ($routes) {
		$routes->get('/', 'Orders::index');
		$routes->get('create', 'Orders::create');
		$routes->get('(:num)', 'Orders::show/$1');
		$routes->post('(:num)', 'Orders::update/$1');
		$routes->post('status/(:num)', 'Orders::update_status/$1');
	});

	$routes->group('category', static function ($routes) {
		$routes->get('/', 'category::index');
		$routes->post('/', 'category::store');
		$routes->get('add', 'category::add');
		$routes->get('edit/(:num)', 'category::edit/$1');
		$routes->post('edit/(:num)', 'category::update/$1');
		$routes->post('delete/(:num)', 'category::delete/$1');
	});

	$routes->group('products', static function ($routes) {
		$routes->get('/', 'Products::index');
		$routes->post('/', 'Products::store');
		$routes->get('add', 'Products::add');
		$routes->get('edit/(:num)', 'Products::edit/$1');
		$routes->post('edit/(:num)', 'Products::update/$1');
		$routes->post('delete/(:num)', 'Products::delete/$1');
	});

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

	$routes->group('settings', static function ($routes) {
		// $routes->get('/', 'Settings::index');
		// $routes->post('/', 'Settings::store');
		$routes->get('profile', 'Settings::update_profile');
		// $routes->post('add', 'Settings::update_profile');
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

	$routes->group('orders', static function ($routes) {
		$routes->get('/', 'Orders::index');
		$routes->get('(:num)', 'Orders::show/$1');
	});

	$routes->get('orders', 'Orders::index');
	$routes->get('Settings', 'Settings::index');
});
