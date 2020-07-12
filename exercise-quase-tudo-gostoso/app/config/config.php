<?php
date_default_timezone_set('America/Sao_Paulo');

define('BASE', '/quase-tudo-gostoso/');
define('HOST', 'http://localhost/quase-tudo-gostoso/');

define('DATE_TIME', 'd/m/Y H:i:s');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'qt-gostoso');

$router = [
    /* VIEW */
    'home' => 'HomeController@index',
    'nova' => 'ReceitaController@nova',
    'editar' => 'ReceitaController@editar',
    'ver' => 'ReceitaController@ver',
    'busca' => 'ReceitaController@busca',
    /* INTERNAL */
    'delete' => 'ReceitaController@delete',
    'insert' => 'ReceitaController@insert',
    'update' => 'ReceitaController@update'
];
