<?php 

date_default_timezone_set('America/Sao_Paulo');
define('BASE', '/');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'qt-gostoso');

$router = [
    // Views
    'home' => 'RouterController@indexRevenues',
    'criar' => 'RouterController@createRevenue',
    'editar' => 'RouterController@updateRevenue',
    'ver' => 'RouterController@showRevenue',
    // Revenue
    'index' => 'RevenueController@index',
    'show' => 'RevenueController@show',
    'create' => 'RevenueController@create',
    'update' => 'RevenueController@update',
    'delete' => 'RevenueController@delete',
];