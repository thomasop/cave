<?php

namespace App\controller;

use App\manager\CavedManager;
use App\tool\CaveArray;

class ControllerD extends Controller
{
    public function index()
    {
        $manager = new CavedManager();
        $caveArray = new CaveArray();
        $data = $caveArray->array($manager);
        $twigview = $this->getTwig();
        $twigpostview = $twigview->load('/cave_d/cave_d_all/index.twig');
        echo $twigpostview->render([
            'lists' => $data[0],
            'letters' => $data[1],
            'count' => $data[2],
            'slug' => $data[3],
            'all' => $data[4],
        ]);
    }
}