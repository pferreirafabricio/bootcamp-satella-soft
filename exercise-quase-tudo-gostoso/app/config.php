<?php 

define('BASE', '/');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'qt-gostoso');

$router = [
    'home' => 'RevenueController@index',
    'create' => 'RevenueController@create',
    'update' => 'RevenueController@update',
    'show' => 'RevenueController@show',
];