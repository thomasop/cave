<?php

namespace App\controller;

use App\manager\CavebManager;
use App\tool\CaveArray;
use App\controller\Controller;

class ControllerB extends Controller
{
    public function index() {
        $manager = new CavebManager();
        $caveArray = new CaveArray();
        $data = $caveArray->arrayBig($manager);
        $twigview = $this->getTwig();
        $twigpostview = $twigview->load('/cave_b/cave_b_all/index.twig');
        echo $twigpostview->render([
            'lists' => $data[0],
            'letters' => $data[1],
            'count' => $data[2],
            'slug' => $data[3],
            'all' => $data[4],
        ]);
    }
}