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

    public function addView()
    {
        $manager = new CaveaManager();
        $caveArray = new CaveArray();
        $data = $caveArray->array($manager);
        $twigview = $this->getTwig();
        $twigpostview = $twigview->load('cave_a/cave_a_add/index.twig');
        echo $twigpostview->render([
            'lists' => $data[0],
            'letters' => $data[1],
            'slug' => $data[3],
            'all' => $data[4],
        ]);
    }

    public function add()
    {
        $manager = new CaveaManager();
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
        $this->phpSession()->redirect('/cave/a');
    }

    public function deleteView()
    {
        $manager = new CaveaManager();
        $caveArray = new CaveArray();
        $data = $caveArray->array($manager);
        $twigview = $this->getTwig();
        $twigpostview = $twigview->load('cave_a/cave_a_delete/index.twig');
        echo $twigpostview->render([
            'lists' => $data[0],
            'letters' => $data[1],
            'slug' => $data[3],
            'all' => $data[4],
        ]);
    }

    public function delete()
    {
        $manager = new CaveaManager();
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
        $this->phpSession()->redirect('/cave/a');
    }

    public function editView()
    {
        $manager = new CaveaManager();
        $strYear = explode("-", $_GET['zz']);
        $count = count($strYear);
        $strApostro = str_replace("apostrophe", "'", $_GET['zz']);
        $one = $manager->getOne(str_replace("-" . $strYear[$count - 1], "", $strApostro), $strYear[$count - 1]);
        if ($one) {
            $twigview = $this->getTwig();
            $twigpostview = $twigview->load('/cave_a/cave_a_edit/index.twig');
            echo $twigpostview->render([
                'one' => $one,
                'apostrophe' => $_GET['zz'],
            ]);
        } else {
            $this->phpSession()->set('stop', 'Cette bouteille n\'as pas été trouvé.');
            $this->phpSession()->redirect('/cave/a');
        }
    }

    public function edit()
    {
        $manager = new CaveaManager();
        $strYear = explode("-", $_GET['zz']);
        $count = count($strYear);
        $strApostro = str_replace("apostrophe", "'", $_GET['zz']);
        $one = $manager->getOne(str_replace("-" . $strYear[$count - 1], "", $strApostro), $strYear[$count - 1]);
        if ($one) {
            $update = $manager->update($one, $_POST["nom"], $_POST["appellation"], $_POST["annee"], $_POST["type"], $_POST["region"], $_POST["contenance"], str_replace([" ", "â", "é", "è", "à", "ê", "î", "û", "ô"], ["-", "a", "e", "e", "a", "e", "i", "u", "o"], $_POST['nom']), $_POST['pays']);
            $this->phpSession()->set('stop', 'Cette bouteille a été modifié.');
            $this->phpSession()->redirect('/cave/a');
        } else {
            $this->phpSession()->set('stop', 'Cette bouteille n\'as pas été trouvé.');
            $this->phpSession()->redirect('/cave/a');
        }
    }
}