<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->post('/auth/login', 'AuthController::auth');
$routes->get('/auth/logout', 'AuthController::logout');

$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/settings', 'DashboardController::settings');
$routes->get('/keluarga', 'DashboardController::keluarga');

$routes->post('kuesioner/getData', 'KuesionerController::getData');
$routes->get('kuesioner/create', 'KuesionerController::create');



