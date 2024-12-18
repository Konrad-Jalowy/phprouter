<?php
require '../helpers.php';

spl_autoload_register(function($class){
    $path = basePath("Framework/$class.php");
    if(file_exists($path)){
        require_once $path;
    } else {
        $path = basePath("App/Controllers/$class.php");
        if(file_exists($path)){
            require_once $path;
        }
    }
});

$router = new Router();
$routes = require basePath('routes.php');
$session = new Session();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->route($uri);
