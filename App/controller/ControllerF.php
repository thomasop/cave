<?php

namespace App\controller;

use App\manager\CavefManager;
use App\tool\CaveArray;

class ControllerF extends Controller
{
    public function index()
    {
        $manager = new CavefManager();
        $caveArray = new CaveArray();
        $data = $caveArray->array($manager);
        $twigview = $this->getTwig();
        $twigpostview = $twigview->load('/cave_f/cave_f_all/index.twig');
        echo $twigpostview->render([
            'lists' => $data[0],
            'letters' => $data[1],
            'count' => $data[2],
            'slug' => $data[3],
            'all' => $data[4],
        ]);
    }
}