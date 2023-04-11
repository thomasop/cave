<?php
namespace App\manager;

use PDO;
use App\entity\Cavea;

class CavebManager extends Manager
{
    public function allPosition()
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare(
            'SELECT c.*, p.colonne, p.ligne
            FROM cave_b c
            JOIN position_cave_b a ON c.id = a.cave_b_id
            JOIN position_b p ON a.position_id = p.id'
        );
        $bdGetAll->execute();
        $result = $bdGetAll->fetchAll(PDO::FETCH_ASSOC);
        return $result;  
    }
}