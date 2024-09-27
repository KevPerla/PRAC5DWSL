<?php
require_once "config/config.php";
require_once "controllers/AuthController.php";
require_once "controllers/HomeController.php";
require_once "routes/Router.php";

$router = new Router();

$router->get('/', 'AuthController@index');
$router->get('/home', 'HomeController@index');


$router->run();
?>