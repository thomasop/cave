<?php

namespace App\controller;

class ControllerIndex extends Controller
{
    function index()
    {
        $twigview = $this->getTwig();     
        $twigindex = $twigview->load('home/index.html.twig');
        echo $twigindex->render();
    }
}