<?php

namespace app\site\controller;
use app\site\controller\TwigController;

class RouterController extends TwigController 
{
    public function indexRevenues()
    {
        $this->view('home/main', []);
    }

    public function showRevenue()
    {
        $this->view('revenue/show', []);
    }

    public function createRevenue()
    {
        $this->view('revenue/create', []);
    }

    public function updateRevenue()
    {
        $this->view('revenue/update', []);
    }

    public function updateThumb()
    {
        $this->view('revenue/updateThumb', []);
    }
}