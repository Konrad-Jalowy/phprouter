<?php

echo "hello world</br>";
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
echo $uri;