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

    public function addView()
    {
        $manager = new CaveeManager();
        $caveArray = new CaveArray();
        $data = $caveArray->array($manager);
        $twigview = $this->getTwig();
        $twigpostview = $twigview->load('cave_e/cave_e_add/index.twig');
        echo $twigpostview->render([
            'lists' => $data[0],
            'letters' => $data[1],
            'slug' => $data[3],
            'all' => $data[4],
        ]);
    }

    public function add()
    {
        $manager = new CaveeManager();
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
        $this->phpSession()->redirect('/cave2/e');
    }

    public function deleteView()
    {
        $manager = new CaveeManager();
        $caveArray = new CaveArray();
        $data = $caveArray->array($manager);
        $twigview = $this->getTwig();
        $twigpostview = $twigview->load('cave_e/cave_e_delete/index.twig');
        echo $twigpostview->render([
            'lists' => $data[0],
            'letters' => $data[1],
            'slug' => $data[3],
            'all' => $data[4],
        ]);
    }

    public function delete()
    {
        $manager = new CaveeManager();
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
        $this->phpSession()->redirect('/cave2/e');
    }

    public function editView()
    {
        $manager = new CaveeManager();
        $strYear = explode("-", $_GET['zz']);
        $count = count($strYear);
        $strApostro = str_replace("apostrophe", "'", $_GET['zz']);
        $one = $manager->getOne(str_replace("-" . $strYear[$count - 1], "", $strApostro), $strYear[$count - 1]);
        if ($one) {
            $twigview = $this->getTwig();
            $twigpostview = $twigview->load('/cave_e/cave_e_edit/index.twig');
            echo $twigpostview->render([
                'one' => $one,
                'apostrophe' => $_GET['zz']
            ]);
        } else {
            $this->phpSession()->set('stop', 'Cette bouteille n\'as pas été trouvé.');
            $this->phpSession()->redirect('/cave2/e');
        }
    }

    public function edit()
    {
        $manager = new CaveeManager();
        $strYear = explode("-", $_GET['zz']);
        $count = count($strYear);
        $strApostro = str_replace("apostrophe", "'", $_GET['zz']);
        $one = $manager->getOne(str_replace("-" . $strYear[$count - 1], "", $strApostro), $strYear[$count - 1]);
        if ($one) {
            $update = $manager->update($one, htmlspecialchars($_POST["nom"]), htmlspecialchars($_POST["appellation"]), htmlspecialchars($_POST["annee"]), htmlspecialchars($_POST["type"]), htmlspecialchars($_POST["region"]), htmlspecialchars($_POST["contenance"]), str_replace([" ", "â", "é", "è", "à", "ê", "î", "û", "ô"], ["-", "a", "e", "e", "a", "e", "i", "u", "o"], htmlspecialchars($_POST['nom'])), htmlspecialchars($_POST['pays']));
            $this->phpSession()->set('stop', 'Cette bouteille a été modifié.');
            $this->phpSession()->redirect('/cave2/e');
        } else {
            $this->phpSession()->set('stop', 'Cette bouteille n\'as pas été trouvé.');
            $this->phpSession()->redirect('/cave2/e');
        }
    }

    public function addPositionview()
    {
        $manager = new CaveeManager();
        $strYear = explode("-", $_GET['zz']);
        $count = count($strYear);
        $strApostro = str_replace("apostrophe", "'", $_GET['zz']);
        $one = $manager->getOne(str_replace("-" . $strYear[$count - 1], "", $strApostro), $strYear[$count - 1]);
        if ($one) {
            $caveArray = new CaveArray();
            $data = $caveArray->array($manager);
            $posBout = [];
            for ($i = 0; $i < count($data[4]); $i++) {
                if ($one["nom"] === $data[4][$i][1] && $one["annee"] === $data[4][$i][3]) {
                    array_push($posBout, $data[4][$i]);
                }
            }
            $twigview = $this->getTwig();
            $twigpostview = $twigview->load('cave_e/cave_e_addthis/index.twig');
            echo $twigpostview->render([
                'lists' => $data[0],
                'letters' => $data[1],
                'one' => $one,
                'slug' => $data[3],
                'all' => $data[4],
                'apostrophe' => $_GET['zz'],
                'posBout' => $posBout
            ]);
        } else {
            $this->phpSession()->set('stop', 'Cette bouteille n\'as pas été trouvé.');
            $this->phpSession()->redirect('/cave2/e');
        }
    }

    public function addPosition()
    {
        $manager = new CaveeManager();
        $strYear = explode("-", $_GET['zz']);
        $count = count($strYear);
        $strApostro = str_replace("apostrophe", "'", $_GET['zz']);
        $one = $manager->getOne(str_replace("-" . $strYear[$count - 1], "", $strApostro), $strYear[$count - 1]);
        if ($one) {
            $init = (int) $one["quantite"];
            $caveArray = new CaveArray();
            for ($i = 1; $i < 101; $i++) {
                if (isset($_POST[(string) $i])) {
                    $loopFor = $caveArray->forLoop($_POST[(string) $i], $manager, $one, $init);
                    $init++;
                }
            }
            $uuu = $manager->updateQtn($one, $init);
            $this->phpSession()->set('stop', 'Une bouteille a été ajouté.');
            $this->phpSession()->redirect('/cave2/e');
        } else {
            $this->phpSession()->set('stop', 'Cette bouteille n\'as pas été trouvé.');
            $this->phpSession()->redirect('/cave2/e');
        }
    }

    function show()
    {
        $manager = new CaveeManager();
        $strYear = explode("-", $_GET['zz']);
        $count = count($strYear);
        $strApostro = str_replace("apostrophe", "'", $_GET['zz']);
        $one = $manager->getOne(str_replace("-" . $strYear[$count - 1], "", $strApostro), $strYear[$count - 1]);
        if ($one) {
            $caveArray = new CaveArray();
            $data = $caveArray->array($manager);
            $posArray = [];
            for ($i = 0; $i < count($data[4]); $i++) {
                if (str_replace("-" . $strYear[$count - 1], "", $strApostro) == $data[4][$i][1] && $strYear[$count - 1] == $data[4][$i][3]) {
                    array_push($posArray, $data[4][$i][10] . "-" . $data[4][$i][11]);
                }
            }
            $twigview = $this->getTwig();
            $twigpostview = $twigview->load('cave_e/cave_e_detail/index.twig');
            echo $twigpostview->render([
            'lists' => $data[0],
            'letters' => $data[1],
            'one' => $one,
            'slug' => $data[3],
            'all' => $data[4],
            'allpos' => $posArray
            ]);
        } else {
            $this->phpSession()->set('stop', 'Cette bouteille n\'as pas été trouvé.');
            $this->phpSession()->redirect('/cave2/e');
        }

    }
}