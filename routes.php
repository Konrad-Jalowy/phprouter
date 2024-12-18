<?php
$router->get('/', 'HomeController@index');
$router->get('/active', 'HomeController@active');
$router->get('/single/{id}', 'HomeController@single');