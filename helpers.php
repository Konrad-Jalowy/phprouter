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