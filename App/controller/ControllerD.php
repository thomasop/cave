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

    public function addView()
    {
        $manager = new CavedManager();
        $caveArray = new CaveArray();
        $data = $caveArray->array($manager);
        $twigview = $this->getTwig();
        $twigpostview = $twigview->load('cave_d/cave_d_add/index.twig');
        echo $twigpostview->render([
            'lists' => $data[0],
            'letters' => $data[1],
            'slug' => $data[3],
            'all' => $data[4],
        ]);
    }

    public function add()
    {
        $manager = new CavedManager();
        $manager->addCave(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['appellation']), htmlspecialchars($_POST['annee']), htmlspecialchars($_POST['type']), htmlspecialchars($_POST['region']), htmlspecialchars($_POST['contenance']), str_replace([" ", "â", "é", "è", "à", "ê", "î", "û", "ô"], ["-", "a", "e", "e", "a", "e", "i", "u", "o"], htmlspecialchars($_POST['nom'])), htmlspecialchars($_POST['pays']));
        $one = $manager->getOne(str_replace([" ", "â", "é", "è", "à", "ê", "î", "û", "ô"], ["-", "a", "e", "e", "a", "e", "i", "u", "o"], htmlspecialchars($_POST['nom'])), htmlspecialchars($_POST['annee']));
        $init = 0;
        $caveArray = new CaveArray();
        for ($i = 1; $i < 101; $i++) {
            if (isset($_POST[(string) $i])) {
                $loopFor = $caveArray->forLoop($_POST[(string) $i], $manager, $one, $init);
                $init++;
            }
        }
        $uuu = $manager->updateQtn($one, $init);
        $this->phpSession()->set('stop', 'Une bouteille a été ajouté.');
        $this->phpSession()->redirect('/cave2/d');
    }

    public function deleteView()
    {
        $manager = new CavedManager();
        $caveArray = new CaveArray();
        $data = $caveArray->array($manager);
        $twigview = $this->getTwig();
        $twigpostview = $twigview->load('cave_d/cave_d_delete/index.twig');
        echo $twigpostview->render([
            'lists' => $data[0],
            'letters' => $data[1],
            'slug' => $data[3],
            'all' => $data[4],
        ]);
    }

    public function delete()
    {
        $manager = new CavedManager();
        for ($i = 1; $i < 101; $i++) {
            if (isset($_POST[$i])) {
                $pos = $_POST[(string) $i];
                if ($pos == true) {
                    $split = explode("-", $pos);
                    $getOne = $manager->oneByPosition($split[0], $split[1]);
                    $manager->updateQtn($getOne, (string) ((int) $getOne["quantite"] - 1));
                    $manager->deletePosition($split[0], $split[1]);
                }
            }
        }
        $caveAallB = $manager->all();
        for ($i = 0; $i < count($caveAallB); $i++) {
            if ($caveAallB[$i]["quantite"] == 0) {
                $manager->deleteBout($caveAallB[$i]["id"]);
            }
        }
        $this->phpSession()->set('stop', 'Une bouteille a été supprimé.');
        $this->phpSession()->redirect('/cave2/d');
    }
}