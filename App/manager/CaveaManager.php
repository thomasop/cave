<?php
namespace App\manager;

use PDO;
use App\entity\Cavea;

class CaveaManager extends Manager
{
    public function all()
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare('SELECT id, nom, quantite, annee FROM cave_a');
        $bdGetAll->execute();
        $result = $bdGetAll->fetchAll(PDO::FETCH_ASSOC);
        return $result;  
    }

    public function allPosition()
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare(
            'SELECT c.*, p.colonne, p.ligne
            FROM cave_a c
            JOIN position_cave_a a ON c.id = a.cave_a_id
            JOIN position_a p ON a.position_id = p.id'
        );
        $bdGetAll->execute();
        $result = $bdGetAll->fetchAll(PDO::FETCH_ASSOC);
        return $result;  
    }
}