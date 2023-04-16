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

    public function addView()
    {
        $manager = new CavefManager();
        $caveArray = new CaveArray();
        $data = $caveArray->array($manager);
        $twigview = $this->getTwig();
        $twigpostview = $twigview->load('cave_f/cave_f_add/index.twig');
        echo $twigpostview->render([
            'lists' => $data[0],
            'letters' => $data[1],
            'slug' => $data[3],
            'all' => $data[4],
        ]);
    }

    public function add()
    {
        $manager = new CavefManager();
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
        $this->phpSession()->redirect('/cave2/f');
    }

    public function addPositionview()
    {
        $manager = new CavefManager();
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
            $twigpostview = $twigview->load('cave_f/cave_f_addthis/index.twig');
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
            $this->phpSession()->redirect('/cave2/f');
        }
    }

    public function addPosition()
    {
        $manager = new CavefManager();
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
            $this->phpSession()->redirect('/cave2/f');
        } else {
            $this->phpSession()->set('stop', 'Cette bouteille n\'as pas été trouvé.');
            $this->phpSession()->redirect('/cave2/f');
        }
    }
}