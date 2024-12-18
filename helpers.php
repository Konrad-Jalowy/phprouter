<?php

function basePath($path = '')
{
  return __DIR__ . '/' . $path;
}

function redirect($url)
{
  header("Location: {$url}");
  exit;
}


function inspect($value)
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
}

function hasParams($route){
    if(!preg_match('/\{(.+?)\}/', $route)){
        return false;
    }
    return true;
}

function loadView($name, $data = [])
{
  $viewPath = basePath("App/views/{$name}.view.php");

  if (file_exists($viewPath)) {
    extract($data);
    require $viewPath;
  } else {
    echo "View '{$name} not found!'";
  }
}

function loadPartial($name, $data = [])
{
  $partialPath = basePath("App/views/partials/{$name}.php");

  if (file_exists($partialPath)) {
    extract($data);
    require $partialPath;
  } else {
    echo "Partial '{$name} not found!'";
  }
}