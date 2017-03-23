<?php
require __DIR__.'/../vendor/autoload.php';

$router = new App\Router\Router($_SERVER['REQUEST_URI']);

$router->get('/', "HomeController@racine");
$router->get('/home', "HomeController@index");
$router->get('/search/:msg', "HomeController@search")->with('msg', '[a-z]{2,}');

$router->run();