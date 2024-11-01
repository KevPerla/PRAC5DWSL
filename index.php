<?php
require_once "config/config.php";
require_once "database/DB.php";
require_once "controllers/AuthController.php";
require_once "controllers/HomeController.php";
require_once "controllers/MateriasController.php";
require_once "routes/Router.php";

$router = new Router();

$router->get('/', 'AuthController@index');
$router->get('/home', 'HomeController@index');
$router->get('/materias', 'MateriasController@index');
$router->get('/agregar-materia', 'MateriasController@create');
$router->post('/guardar-materia', 'MateriasController@insert');


$router->run();
?>