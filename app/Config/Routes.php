<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('register', 'RegisterController::index');
$routes->post('register/save', 'RegisterController::save');

$routes->get('login', 'LoginController::login');
$routes->post('login/proses', 'LoginController::authenticate');
$routes->get('logout', 'LoginController::logout');

$routes->get('dashboard', 'DashboardController::index');

$routes->get('beli', 'BeliController::index');
$routes->post('beli-proses', 'BeliController::proses');
$routes->get('invoice/(:segment)', 'BeliController::invoice/$1');
$routes->post('beli-checkout', 'BeliController::checkout');

// $routes->post('callback', 'DigiFlazzController::callback');

$routes->get('logs', 'DashboardController::logTransaction');