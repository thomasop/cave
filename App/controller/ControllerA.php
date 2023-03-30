<?php

namespace App\controller;

use App\manager\CaveaManager;
use App\tool\CaveArray;

class ControllerA extends Controller
{
    public function index()
    {
        $manager = new CaveaManager();
        $caveArray = new CaveArray();
        $data = $caveArray->array($manager);
        $twigview = $this->getTwig();
        $twigpostview = $twigview->load('/cave_a/cave_a_all/index.twig');
        echo $twigpostview->render([
            'lists' => $data[0],
            'letters' => $data[1],
            'count' => $data[2],
            'slug' => $data[3],
            'all' => $data[4],
        ]);
    }
}