<?php
define('BASE', '/bootcamp-satellaSoft/exercise-intense-php/');

define('DATA_PATH', 'data');

$router = [
    //View
    'home' => 'ContaController@home',
    'saldo' => 'ContaController@saldo',
    'extrato' => 'ContaController@extrato',
    'deposito' => 'ContaController@deposito',
    'saque' => 'ContaController@saque',
    'cadastro' => 'LoginController@cadastro',
    //INTERNAL
    'auth' => 'LoginController@auth',
    'sair' => 'LoginController@logout',
    'register' => 'LoginController@register'
];
