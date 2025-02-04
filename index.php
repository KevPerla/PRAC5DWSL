<?php
require_once "config/config.php";
require_once "database/DB.php";
require_once "controllers/AuthController.php";
require_once "controllers/HomeController.php";
require_once "controllers/MateriasController.php";
require_once "controllers/GruposController.php";
require_once "controllers/PermisosController.php";
require_once "controllers/UsersController.php";
require_once "routes/Router.php";

$router = new Router();

$router->get('/', 'AuthController@index');
$router->get('/home', 'HomeController@index');
$router->get('/materias', 'MateriasController@index');
$router->get('/agregar-materia', 'MateriasController@create');
$router->post('/guardar-materia', 'MateriasController@insert');
$router->get('/editar-materia/{id}', 'MateriasController@edit');
$router->post('/actualizar-materia/{id}', 'MateriasController@update');
$router->post('/borrar-materia/{id}', 'MateriasController@delete');


$router->get('/grupos', 'GruposController@index');
$router->get('/agregar-grupo', 'GruposController@create');
$router->post('/guardar-grupo', 'GruposController@insert');
$router->get('/editar-grupo/{id}', 'GruposController@edit');
$router->post('/actualizar-grupo/{id}', 'GruposController@update');
$router->post('/borrar-grupo/{id}', 'GruposController@delete');

$router->get('/permisos/{id}', 'PermisosController@index');
$router->post('/cambiar-permisos/{id}', 'PermisosController@update');

$router->get('/users', 'UsersController@index');
$router->get('/agregar-usuario', 'UsersController@create');
$router->post('/guardar-usuario', 'UsersController@insert');
$router->get('/editar-usuario/{id}', 'UsersController@edit');
$router->post('/actualizar-usuario/{id}', 'UsersController@update');
$router->post('/borrar-usuario/{id}', 'UsersController@delete');

$router->run();
?>