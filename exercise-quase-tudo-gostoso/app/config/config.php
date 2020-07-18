<?php
date_default_timezone_set('America/Sao_Paulo');

define('LOCAL_DIR', 'C:/xampp/htdocs');
define('BASE', '/bootcamp-satellaSoft/exercise-quase-tudo-gostoso/');
define('HOST', 'http://localhost/bootcamp-satellaSoft/exercise-quase-tudo-gostoso/');

define('DATE_TIME', 'd/m/Y H:i:s');

define('DB_HOST', '127.0.0.1:3306');
define('DB_USER', 'root');
define('DB_PASS', 'cadeira12');
define('DB_NAME', 'qt-gostoso');

$router = [
    /* VIEW */
    'home' => 'HomeController@index',
    'nova' => 'ReceitaController@nova',
    'editar' => 'ReceitaController@editar',
    'ver' => 'ReceitaController@ver',
    'busca' => 'ReceitaController@busca',
    'editarThumb' => 'ReceitaController@editarThumb',
    /* INTERNAL */
    'delete' => 'ReceitaController@delete',
    'insert' => 'ReceitaController@insert',
    'update' => 'ReceitaController@update',
    'updateThumb' => 'ReceitaController@updateThumb'
];
