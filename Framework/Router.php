<?php

class Router
{
  protected $routes = [];
  protected $prefix = "";
  
  public function route($uri){
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    if ($requestMethod === 'POST' && isset($_POST['_method'])) {
      $requestMethod = strtoupper($_POST['_method']);
    }

    echo "$requestMethod -> $uri </br>";
  }

}