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

    public function getOne($slug, $annee)
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare('SELECT * FROM cave_a WHERE slug = ? AND annee = ?');
        $bdGetAll->execute([$slug, $annee]);
        $result = $bdGetAll->fetch(PDO::FETCH_ASSOC);
        return $result;  
    }

    public function addCave($nom, $appellation, $annee, $type, $region, $contenance, $slug, $pays)
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare(
            'INSERT INTO cave_a(nom, appellation, annee, typev, region, contenance, slug, pays) VALUES(?, ?, ?, ?, ?, ?, ?, ?)'
        );
        $bdGetAll->execute(array($nom, $appellation, $annee, $type, $region, $contenance, $slug, $pays));
        return $bdGetAll;  
    }

    public function updateQtn($id, $qtn)
    {
        $bd = $this->connection();
        $bdGet = $bd->prepare(
            'UPDATE cave_a SET quantite = :qtn WHERE id = :id'
        );
        $bdGet->bindValue(':id', (int)$id["id"], PDO::PARAM_INT);
        $bdGet->bindValue(':qtn', $qtn, PDO::PARAM_INT);
        $bdGet->execute();
        return $bdGet;  
    }

    public function deletePosition($colonne, $ligne)
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare(
            'DELETE FROM position_a
            WHERE position_a.colonne = ?
            AND position_a.ligne = ?'
        );
        $bdGetAll->execute(array($colonne, $ligne));
        return $bdGetAll;  
    }

    public function deleteBout($id)
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare(
            'DELETE FROM cave_a
            WHERE cave_a.id = ?'
        );
        $bdGetAll->execute(array($id));
        return $bdGetAll;  
    }

    public function oneByPosition($colonne, $ligne)
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare(
            'SELECT c.*
            FROM cave_a c
            JOIN position_cave_a a ON c.id = a.cave_a_id
            JOIN position_a p ON a.position_id = p.id
            WHERE p.colonne = ?
            AND p.ligne = ?'
        );
        $bdGetAll->execute(array($colonne, $ligne));
        $result = $bdGetAll->fetch(PDO::FETCH_ASSOC);
        return $result;  
    }
}