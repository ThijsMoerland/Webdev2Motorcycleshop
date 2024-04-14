<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/../vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

$router->setNamespace('Controllers');

// routes for the articles endpoint
$router->post('/users/login', 'UserController@login');

$router->get('/motorcycles', 'MotorcycleController@getAll');
$router->get('/motorcycles/available', 'MotorcycleController@getAllAvailableMotorcycles');
$router->get('/motorcycles/(\d+)', 'MotorcycleController@getOne');
$router->put('/motorcycles/(\d+)', 'MotorcycleController@update');
$router->put('/motorcycles/(\d+)/sold', 'MotorcycleController@setMotorcycleToSold');
$router->post('/motorcycles' , 'MotorcycleController@create');
$router->delete('/motorcycles/(\d+)', 'MotorcycleController@delete');

// Run it!
$router->run();