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
    foreach ($this->routes as $route) {
      print_r($route);
      

      if(!hasParams($route["uri"])){
        echo "<b>route {$route["uri"]} has no params</b></br>";
        if($route["uri"] === $uri){
          $instance = new $route["controller"];
          $methodtocall = $route["controllerMethod"];
          $instance->$methodtocall();
          return;
        }
      } else {

        $uriSegments = explode('/', trim($uri, '/'));
        $routeSegments = explode('/', trim($route['uri'], '/'));
        
  
        print_r($uriSegments);
        echo "</br>";
        print_r($routeSegments);
        echo "</br>";
  
        $match = true;
  
        if (count($uriSegments) === count($routeSegments) && strtoupper($route['method'] === $requestMethod)) {
          $params = [];
  
          $match = true;
          echo "there is potential match";
          for ($i = 0; $i < count($uriSegments); $i++) {
           
            if ($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
              $match = false;
              echo "no match </br>";
              break;
            }
  
            
          }
          if($match){
            echo "match! </br>";
          }
        }

      }
      
     
    }
  }

  public function registerRoute($method, $uri, $action)
  {
    list($controller, $controllerMethod) = explode('@', $action);

    $this->routes[] = [
      'method' => $method,
      'uri' => $uri,
      'controller' => $controller,
      'controllerMethod' => $controllerMethod
    ];
  }

  public function get($uri, $controller)
  {
    $this->registerRoute('GET', $uri, $controller);
  }

  
  public function post($uri, $controller)
  {
    $this->registerRoute('POST', $uri, $controller);
  }

  
  public function put($uri, $controller)
  {
    $this->registerRoute('PUT', $uri, $controller);
  }

  
  public function delete($uri, $controller)
  {
    $this->registerRoute('DELETE', $uri, $controller);
  }



}