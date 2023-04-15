<?php

namespace App\controller;

use App\manager\CaveeManager;
use App\tool\CaveArray;

class ControllerE extends Controller
{
    public function index()
    {
        $manager = new CaveeManager();
        $caveArray = new CaveArray();
        $data = $caveArray->array($manager);
        $twigview = $this->getTwig();
        $twigpostview = $twigview->load('/cave_e/cave_e_all/index.twig');
        echo $twigpostview->render([
            'lists' => $data[0],
            'letters' => $data[1],
            'count' => $data[2],
            'slug' => $data[3],
            'all' => $data[4],
        ]);
    }
}