<?php

namespace app\controller;

use app\core\Controller;

class ContaController extends Controller
{
    public function __construct()
    {
        //Habilita segurança nesses módulos
        security();
    }

    //#### VIEW ####
    public function home()
    {
        $this->view('interna/home');
    }

    public function saldo()
    {
        $saldo = 1800.00;

        $this->view('interna/saldo', [
            'saldo' => $saldo
        ]);
    }

    public function extrato()
    {
        $this->view('interna/extrato', []);
    }

    public function deposito()
    {
        $this->view('interna/deposito');
    }

    public function saque()
    {
        $this->view('interna/saque');
    }

    //#### INTERNAL ####
}
