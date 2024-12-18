<?php
$router->get('/', 'HomeController@index');
$router->get('/single/{id}', 'HomeController@single');