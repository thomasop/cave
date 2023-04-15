<?php

namespace App\controller;

use App\manager\CaveaManager;
use App\manager\CavebManager;
use App\manager\CavecManager;
use App\manager\CavedManager;
use App\manager\CaveeManager;
use App\controller\Controller;

class ControllerIndex extends Controller
{
    function index()
    {
        $managerA = new CaveaManager();
        $managerB = new CavebManager();
        $managerC = new CavecManager();
        $managerD = new CavedManager();
        $managerE = new CaveeManager();/* 
        $managerF = new CavefManager();
        $managerG = new CavegManager(); */

        $all = 0;
        $allName = [];
        $allA = $managerA->all();
        for ($i = 0; $i < count($allA); $i++) {
            array_push($allName, [$allA[$i]["nom"], "a", $allA[$i]["annee"]]);
            $all = (int)$all + (int)$allA[$i]["quantite"];
        }
        
        $allB = $managerB->all();
        for ($i = 0; $i < count($allB); $i++) {
            array_push($allName, [$allB[$i]["nom"], "b", $allB[$i]["annee"]]);
            $all = (int)$all + (int)$allB[$i]["quantite"];
        }

        $allC = $managerC->all();
        for ($i = 0; $i < count($allC); $i++) {
            array_push($allName, [$allC[$i]["nom"], "c", $allC[$i]["annee"]]);
            $all = (int)$all + (int)$allC[$i]["quantite"];
        }

        $allD = $managerD->all();
        for ($i = 0; $i < count($allD); $i++) {
            array_push($allName, [$allD[$i]["nom"], "d", $allD[$i]["annee"]]);
            $all = (int)$all + (int)$allD[$i]["quantite"];
        }
       
        $allE = $managerE->all();
        for ($i = 0; $i < count($allE); $i++) {
            array_push($allName, [$allE[$i]["nom"], "e", $allE[$i]["annee"]]);
            $all = (int)$all + (int)$allE[$i]["quantite"];
        }
/*  
        $allF = $managerF->all();
        for ($i = 0; $i < count($allF); $i++) {
            array_push($allName, [$allF[$i]["nom"], "f", $allF[$i]["annee"]]);
            $all = (int)$all + (int)$allF[$i]["quantite"];
        }

        $allG = $managerG->all();
        for ($i = 0; $i < count($allG); $i++) {
            array_push($allName, [$allG[$i]["nom"], "g", $allG[$i]["annee"]]);
            $all = (int)$all + (int)$allG[$i]["quantite"];
        } */
        $twigview = $this->getTwig();     
        $twigindex = $twigview->load('home/index.html.twig');
        echo $twigindex->render([
            'all' => $all,
            'allName' => $allName
        ]);
    }
}