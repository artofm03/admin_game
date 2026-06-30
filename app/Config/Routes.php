<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// ======================
// AUTH ROUTES (PENTING)
// ======================
$routes->get('/login', 'Admin\AuthController::login');
$routes->post('/login', 'Admin\AuthController::attemptLogin');
$routes->get('/logout', 'Admin\AuthController::logout');

// ======================
// ADMIN ROUTES
// ======================
$routes->group('/',['filter' => 'auth'], static function($routes){
    $routes->get('', 'Admin\DashboardController::index'); 
});
$routes->group('admin', ['filter' => 'auth'], static function ($routes) {

    $routes->get('/', 'Admin\DashboardController::index');           // /admin
    $routes->get('dashboard', 'Admin\DashboardController::index');   // /admin/dashboard

    // Students
    $routes->get('students', 'Admin\StudentController::index');
    $routes->get('students/create', 'Admin\StudentController::create');
    $routes->post('students', 'Admin\StudentController::store');
    $routes->get('students/edit/(:num)', 'Admin\StudentController::edit/$1');
    $routes->post('students/update/(:num)', 'Admin\StudentController::update/$1');
    $routes->get('students/delete/(:num)', 'Admin\StudentController::delete/$1');

    // Classes
    $routes->get('classes', 'Admin\ClassController::index');
    $routes->get('classes/create', 'Admin\ClassController::create');
    $routes->get('classes/edit/(:num)', 'Admin\ClassController::edit/$1');
    $routes->post('classes/update/(:num)', 'Admin\ClassController::update/$1');
    $routes->get('classes/delete/(:num)', 'Admin\ClassController::delete/$1');
    $routes->post('classes', 'Admin\ClassController::store');

    // Levels
    $routes->get('levels', 'Admin\LevelController::index');
    $routes->get('levels/create', 'Admin\LevelController::create');
    $routes->post('levels', 'Admin\LevelController::store');
    $routes->get('levels', 'Admin\LevelController::index');
    $routes->get('levels/edit/(:num)', 'Admin\LevelController::edit/$1');
    $routes->post('levels/update/(:num)', 'Admin\LevelController::update/$1');
    $routes->get('levels/delete/(:num)', 'Admin\LevelController::delete/$1');
    
    // Materials
    $routes->get('materials', 'Admin\MaterialController::index');
    $routes->get('materials/create', 'Admin\MaterialController::create');
    $routes->post('materials', 'Admin\MaterialController::store');
    $routes->get('materials/edit/(:num)', 'Admin\MaterialController::edit/$1');
    $routes->post('materials/update/(:num)', 'Admin\MaterialController::update/$1');
    $routes->get('materials/delete/(:num)', 'Admin\MaterialController::delete/$1');

    // Questions
    $routes->get('questions', 'Admin\QuestionController::index');

    // Progress, Reports
    $routes->get('progress', 'Admin\ProgressController::index');
    $routes->get('reports', 'Admin\ReportController::index');
});