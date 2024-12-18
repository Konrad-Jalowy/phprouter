<?php

class Router
{
  protected $routes = [];
  protected $prefix = "";
  
  public function route($uri){
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    echo "$requestMethod -> $uri </br>";
  }

}