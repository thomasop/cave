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

    public function addView()
    {
        $manager = new CavecManager();
        $caveArray = new CaveArray();
        $data = $caveArray->arrayBig($manager);
        $twigview = $this->getTwig();
        $twigpostview = $twigview->load('cave_c/cave_c_add/index.twig');
        echo $twigpostview->render([
            'lists' => $data[0],
            'letters' => $data[1],
            'slug' => $data[3],
            'all' => $data[4],
        ]);
    }

    public function add()
    {
        $manager = new CavecManager();
        $manager->addCave(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['appellation']), htmlspecialchars($_POST['annee']), htmlspecialchars($_POST['type']), htmlspecialchars($_POST['region']), htmlspecialchars($_POST['contenance']), str_replace([" ", "â", "é", "è", "à", "ê", "î", "û", "ô"], ["-", "a", "e", "e", "a", "e", "i", "u", "o"], htmlspecialchars($_POST['nom'])), htmlspecialchars($_POST['pays']));
        $one = $manager->getOne(str_replace([" ", "â", "é", "è", "à", "ê", "î", "û", "ô"], ["-", "a", "e", "e", "a", "e", "i", "u", "o"], htmlspecialchars($_POST['nom'])), htmlspecialchars($_POST['annee']));
        $init = 0;
        $caveArray = new CaveArray();
        for ($i = 1; $i < 151; $i++) {
            if (isset($_POST[(string) $i])) {
                $loopFor = $caveArray->forLoop($_POST[(string) $i], $manager, $one, $init);
                $init++;
            }
        }
        $uuu = $manager->updateQtn($one, $init);
        $this->phpSession()->set('stop', 'Une bouteille a été ajouté.');
        $this->phpSession()->redirect('/cave2/c');
    }
}