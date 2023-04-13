<?php

namespace App\controller;

use App\tool\CaveArray;
use App\manager\CaveaManager;
use App\manager\CavecManager;
use App\controller\Controller;

class ControllerC extends Controller
{
    public function index()
    {
        $manager = new CavecManager();
        $caveArray = new CaveArray();
        $data = $caveArray->arrayBig($manager);
        $twigview = $this->getTwig();
        $twigpostview = $twigview->load('/cave_c/cave_c_all/index.twig');
        echo $twigpostview->render([
            'lists' => $data[0],
            'letters' => $data[1],
            'count' => $data[2],
            'slug' => $data[3],
            'all' => $data[4],
        ]);
    }
}