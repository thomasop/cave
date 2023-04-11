<?php

namespace App\tool;

class CaveArray
{
    function array(object $manager): array | int{
        $arrayCave = [[1 => "vide", 2 => "vide", 3 => "vide", 4 => "vide", 5 => "vide", 6 => "vide", 7 => "vide", 8 => "vide", 9 => "vide", 10 => "vide"],
            [11 => "vide", 12 => "vide", 13 => "vide", 14 => "vide", 15 => "vide", 16 => "vide", 17 => "vide", 18 => "vide", 19 => "vide", 20 => "vide"],
            [21 => "vide", 22 => "vide", 23 => "vide", 24 => "vide", 25 => "vide", 26 => "vide", 27 => "vide", 28 => "vide", 29 => "vide", 30 => "vide"],
            [31 => "vide", 32 => "vide", 33 => "vide", 34 => "vide", 35 => "vide", 36 => "vide", 37 => "vide", 38 => "vide", 39 => "vide", 40 => "vide"],
            [41 => "vide", 42 => "vide", 43 => "vide", 44 => "vide", 45 => "vide", 46 => "vide", 47 => "vide", 48 => "vide", 49 => "vide", 50 => "vide"],
            [51 => "vide", 52 => "vide", 53 => "vide", 54 => "vide", 55 => "vide", 56 => "vide", 57 => "vide", 58 => "vide", 59 => "vide", 60 => "vide"],
            [61 => "vide", 62 => "vide", 63 => "vide", 64 => "vide", 65 => "vide", 66 => "vide", 67 => "vide", 68 => "vide", 69 => "vide", 70 => "vide"],
            [71 => "vide", 72 => "vide", 73 => "vide", 74 => "vide", 75 => "vide", 76 => "vide", 77 => "vide", 78 => "vide", 79 => "vide", 80 => "vide"],
            [81 => "vide", 82 => "vide", 83 => "vide", 84 => "vide", 85 => "vide", 86 => "vide", 87 => "vide", 88 => "vide", 89 => "vide", 90 => "vide"],
            [91 => "vide", 92 => "vide", 93 => "vide", 94 => "vide", 95 => "vide", 96 => "vide", 97 => "vide", 98 => "vide", 99 => "vide", 100 => "vide"]];
        $arrayL = [1 => "J", 11 => "I", 21 => "H", 31 => "G", 41 => "F", 51 => "E", 61 => "D", 71 => "C", 81 => "B", 91 => "A"];
        $arrayP = [0 => "J", 1 => "I", 2 => "H", 3 => "G", 4 => "F", 5 => "E", 6 => "D", 7 => "C", 8 => "B", 9 => "A"];
        $caveAall = $manager->allPosition();
        $all = [];
        $slug = [];
        for ($i = 0; $i < count($caveAall); $i++) {
            array_push($all, [$caveAall[$i]['id'], str_replace("'", "/", $caveAall[$i]['nom']), $caveAall[$i]['quantite'], $caveAall[$i]['annee'], str_replace("'", "/", $caveAall[$i]['slug']), str_replace("'", "/", $caveAall[$i]['appellation']), $caveAall[$i]['typev'], $caveAall[$i]['region'], $caveAall[$i]['contenance'], $caveAall[$i]['pays'], $caveAall[$i]['colonne'], $caveAall[$i]['ligne']]);
            $test = $caveAall[$i]['colonne'];
            $test2 = array_keys($arrayP, $test);
            $arrayCave[$test2[0]][$caveAall[$i]['ligne']] = [$caveAall[$i]['nom'], $caveAall[$i]['typev']];
        }
        $init = 1;
        for ($i = 0; $i < count($arrayCave); $i++) {
            for ($y = 0; $y < count($arrayCave[$i]); $y++) {
                if ($arrayCave[$i][$init] == "vide") {
                    array_push($slug, $arrayCave[$i][$init]);
                } else {
                    if (is_array($arrayCave[$i][$init])) {
                        $strSlug = $arrayCave[$i][$init][0];
                        array_push($slug, str_replace([" ", "â", "é", "è", "à", "ê", "î", "û", "ô", "'"], ["!", "a", "e", "e", "a", "e", "i", "u", "o", "/"], $strSlug));
                    }
                }
                $init += 1;
                if ($y + 1 == 10 || $y + 1 == 20 || $y + 1 == 30 || $y + 1 == 40 || $y + 1 == 50 || $y + 1 == 60 || $y + 1 == 70 || $y + 1 == 80 || $y + 1 == 90 || $y + 1 == 100) {
                    break;
                }
            }
        }
        return [$arrayCave, $arrayL, count($caveAall), $slug, $all];
    }

    public function arrayBig(object $manager): array | int
    {
        $arrayCave = [[1 => "vide", 2 => "vide", 3 => "vide", 4 => "vide", 5 => "vide", 6 => "vide", 7 => "vide", 8 => "vide", 9 => "vide", 10 => "vide"],
            [11 => "vide", 12 => "vide", 13 => "vide", 14 => "vide", 15 => "vide", 16 => "vide", 17 => "vide", 18 => "vide", 19 => "vide", 20 => "vide"],
            [21 => "vide", 22 => "vide", 23 => "vide", 24 => "vide", 25 => "vide", 26 => "vide", 27 => "vide", 28 => "vide", 29 => "vide", 30 => "vide"],
            [31 => "vide", 32 => "vide", 33 => "vide", 34 => "vide", 35 => "vide", 36 => "vide", 37 => "vide", 38 => "vide", 39 => "vide", 40 => "vide"],
            [41 => "vide", 42 => "vide", 43 => "vide", 44 => "vide", 45 => "vide", 46 => "vide", 47 => "vide", 48 => "vide", 49 => "vide", 50 => "vide"],
            [51 => "vide", 52 => "vide", 53 => "vide", 54 => "vide", 55 => "vide", 56 => "vide", 57 => "vide", 58 => "vide", 59 => "vide", 60 => "vide"],
            [61 => "vide", 62 => "vide", 63 => "vide", 64 => "vide", 65 => "vide", 66 => "vide", 67 => "vide", 68 => "vide", 69 => "vide", 70 => "vide"],
            [71 => "vide", 72 => "vide", 73 => "vide", 74 => "vide", 75 => "vide", 76 => "vide", 77 => "vide", 78 => "vide", 79 => "vide", 80 => "vide"],
            [81 => "vide", 82 => "vide", 83 => "vide", 84 => "vide", 85 => "vide", 86 => "vide", 87 => "vide", 88 => "vide", 89 => "vide", 90 => "vide"],
            [91 => "vide", 92 => "vide", 93 => "vide", 94 => "vide", 95 => "vide", 96 => "vide", 97 => "vide", 98 => "vide", 99 => "vide", 100 => "vide"],
            [101 => "vide", 102 => "vide", 103 => "vide", 104 => "vide", 105 => "vide", 106 => "vide", 107 => "vide", 108 => "vide", 109 => "vide", 110 => "vide"],
            [111 => "vide", 112 => "vide", 113 => "vide", 114 => "vide", 115 => "vide", 116 => "vide", 117 => "vide", 118 => "vide", 119 => "vide", 120 => "vide"],
            [121 => "vide", 122 => "vide", 123 => "vide", 124 => "vide", 125 => "vide", 126 => "vide", 127 => "vide", 128 => "vide", 129 => "vide", 130 => "vide"],
            [131 => "vide", 132 => "vide", 133 => "vide", 134 => "vide", 135 => "vide", 136 => "vide", 137 => "vide", 138 => "vide", 139 => "vide", 140 => "vide"],
            [141 => "vide", 142 => "vide", 143 => "vide", 144 => "vide", 145 => "vide", 146 => "vide", 147 => "vide", 148 => "vide", 149 => "vide", 150 => "vide"],
        ];
        $arrayL = [1 => "O", 11 => "N", 21 => "M", 31 => "L", 41 => "K", 51 => "J", 61 => "I", 71 => "H", 81 => "G", 91 => "F", 101 => "E", 111 => "D", 121 => "C", 131 => "B", 141 => "A"];
        $arrayP = [0 => "O", 1 => "N", 2 => "M", 3 => "L", 4 => "K", 5 => "J", 6 => "I", 7 => "H", 8 => "G", 9 => "F", 10 => "E", 11 => "D", 12 => "C", 13 => "B", 14 => "A"];
        $caveAall = $manager->allPosition();
        $all = [];
        $slug = [];
        for ($i = 0; $i < count($caveAall); $i++) {
            array_push($all, [$caveAall[$i]['id'], str_replace("'", "/", $caveAall[$i]['nom']), $caveAall[$i]['quantite'], $caveAall[$i]['annee'], str_replace("'", "/", $caveAall[$i]['slug']), str_replace("'", "/", $caveAall[$i]['appellation']), $caveAall[$i]['typev'], $caveAall[$i]['region'], $caveAall[$i]['contenance'], $caveAall[$i]['pays'], $caveAall[$i]['colonne'], $caveAall[$i]['ligne']]);
            $test = $caveAall[$i]['colonne'];
            $test2 = array_keys($arrayP, $test);
            $arrayCave[$test2[0]][$caveAall[$i]['ligne']] = [$caveAall[$i]['nom'], $caveAall[$i]['typev']];
        }
        $init = 1;
        for ($i = 0; $i < count($arrayCave); $i++) {
            for ($y = 0; $y < count($arrayCave[$i]); $y++) {
                if ($arrayCave[$i][$init] == "vide") {
                    array_push($slug, $arrayCave[$i][$init]);
                } else {
                    $strSlug = $arrayCave[$i][$init][0];
                    array_push($slug, str_replace([" ", "â", "é", "è", "à", "ê", "î", "û", "ô", "'"], ["!", "a", "e", "e", "a", "e", "i", "u", "o", "/"], $strSlug));
                }
                $init += 1;
                if ($y + 1 == 10 || $y + 1 == 20 || $y + 1 == 30 || $y + 1 == 40 || $y + 1 == 50 || $y + 1 == 60 || $y + 1 == 70 || $y + 1 == 80 || $y + 1 == 90 || $y + 1 == 100) {
                    break;
                }
            }
        }
        return [$arrayCave, $arrayL, count($caveAall), $slug, $all];
    }

    public function forLoop(string $pos, object $manager, array $one)
    {
        if ($pos == true) {
            $split = explode("-", $pos);
            $manager->addPosition($split[0], $split[1]);
            $getOne = $manager->getPos($split[0], $split[1]);
            $manager->add($getOne["id"], $one["id"]);
        }
    }
}