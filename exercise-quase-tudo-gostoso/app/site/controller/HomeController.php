<?php

namespace app\site\controller;

use app\core\Controller;

class HomeController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $receitas = (new \app\site\model\ReceitaModel())->readLasts(25);

        $this->view('home/main', [
            'receitas' => arrayTree($receitas)
        ]);
    }
}
