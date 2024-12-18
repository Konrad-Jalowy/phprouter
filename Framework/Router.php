<?php

class Router
{
  protected $routes = [];
  
  
  public function route($uri){
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    if ($requestMethod === 'POST' && isset($_POST['_method'])) {
      $requestMethod = strtoupper($_POST['_method']);
    }

    

    echo "$requestMethod -> $uri </br>";
    foreach ($this->routes as $route) {
      
      if(!hasParams($route["uri"])){
        
        if($route["uri"] === $uri){
          $instance = new $route["controller"];
          $methodtocall = $route["controllerMethod"];
          $instance->$methodtocall();
          return;
        }
      } else {

        $uriSegments = explode('/', trim($uri, '/'));
        $routeSegments = explode('/', trim($route['uri'], '/'));
        
        $match = true;
  
        if (count($uriSegments) === count($routeSegments) && strtoupper($route['method'] === $requestMethod)) {
          $params = [];
  
          $match = true;

         
          for ($i = 0; $i < count($uriSegments); $i++) {
           
            if ($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
              $match = false;
              break;
            }
            if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
              $params[$matches[1]] = $uriSegments[$i];
            }
  
            
          }
          if($match){
            $instance = new $route["controller"];
            $methodtocall = $route["controllerMethod"];
            $instance->$methodtocall(...$params);
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

  private function notFound(){
    die("<h1>404 Not Found</h1>");
  }



}