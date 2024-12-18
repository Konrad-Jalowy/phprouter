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


function requireMe(){
    echo "WORKS!";
}