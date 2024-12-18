<?php
require '../helpers.php';

spl_autoload_register(function($class){
    $path = basePath("Framework/$class.php");
    if(file_exists($path)){
        require_once $path;
    }
});

$router = new Router();
$session = new Session();
var_dump($router);
var_dump($session);
echo "</br>";
echo "hello world</br>";
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
echo "$method->$uri";