<?php
namespace App\manager;

use PDO;
use App\entity\Cavea;

class CavefManager extends Manager
{
    public function all()
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare('SELECT id, nom, quantite, annee FROM cave_f');
        $bdGetAll->execute();
        $result = $bdGetAll->fetchAll(PDO::FETCH_ASSOC);
        return $result;  
    }

    public function allPosition()
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare(
            'SELECT c.*, p.colonne, p.ligne
            FROM cave_f c
            JOIN position_cave_f a ON c.id = a.cave_f_id
            JOIN position_f p ON a.position_id = p.id'
        );
        $bdGetAll->execute();
        $result = $bdGetAll->fetchAll(PDO::FETCH_ASSOC);
        return $result;  
    }

    public function oneByPosition($colonne, $ligne)
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare(
            'SELECT c.*
            FROM cave_f c
            JOIN position_cave_f a ON c.id = a.cave_f_id
            JOIN position_f p ON a.position_id = p.id
            WHERE p.colonne = ?
            AND p.ligne = ?'
        );
        $bdGetAll->execute(array($colonne, $ligne));
        $result = $bdGetAll->fetch(PDO::FETCH_ASSOC);
        return $result;  
    }


    public function getOne($slug, $annee)
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare('SELECT * FROM cave_f WHERE slug = ? AND annee = ?');
        $bdGetAll->execute([$slug, $annee]);
        $result = $bdGetAll->fetch(PDO::FETCH_ASSOC);
        return $result;  
    }

    public function getPos($colonne, $ligne)
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare('SELECT id FROM position_f WHERE colonne = ? AND ligne = ?');
        $bdGetAll->execute([$colonne, $ligne]);
        $result = $bdGetAll->fetch(PDO::FETCH_ASSOC);
        return $result;  
    }

    public function deletePosition($colonne, $ligne)
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare(
            'DELETE FROM position_f
            WHERE position_f.colonne = ?
            AND position_f.ligne = ?'
        );
        $bdGetAll->execute(array($colonne, $ligne));
        return $bdGetAll;  
    }

    public function deleteBout($id)
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare(
            'DELETE FROM cave_f
            WHERE cave_f.id = ?'
        );
        $bdGetAll->execute(array($id));
        return $bdGetAll;  
    }

    public function addCave($nom, $appellation, $annee, $type, $region, $contenance, $slug, $pays)
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare(
            'INSERT INTO cave_f(nom, appellation, annee, typev, region, contenance, slug, pays) VALUES(?, ?, ?, ?, ?, ?, ?, ?)'
        );
        $bdGetAll->execute(array($nom, $appellation, $annee, $type, $region, $contenance, $slug, $pays));
        return $bdGetAll;  
    }

    public function addPosition($colonne, $ligne)
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare(
            'INSERT INTO position_f(colonne, ligne) VALUES(?, ?)'
        );
        $bdGetAll->execute(array($colonne, $ligne));
        return $bdGetAll;  
    }

    public function add($nom, $annee)
    {
        $bd = $this->connection();
        $bdGetAll = $bd->prepare(
            'INSERT INTO position_cave_f(position_id, cave_f_id) VALUES(?, ?)'
        );
        $bdGetAll->execute(array($nom, $annee));
        return $bdGetAll;  
    }

    public function updateQtn($id, $qtn)
    {
        $bd = $this->connection();
        $bdGet = $bd->prepare(
            'UPDATE cave_f SET quantite = :qtn WHERE id = :id'
        );
        $bdGet->bindValue(':id', (int)$id["id"], PDO::PARAM_INT);
        $bdGet->bindValue(':qtn', $qtn, PDO::PARAM_INT);
        $bdGet->execute();
        return $bdGet;  
    }

    public function update($id, $nom, $appellation, $annee, $typev, $region, $contenance, $slug, $pays)
    {
        $bd = $this->connection();
        $bdGet = $bd->prepare(
            'UPDATE cave_f SET nom = :nom, appellation = :appellation, annee = :annee, typev = :typev, region = :region, contenance = :contenance, slug = :slug, pays = :pays WHERE id = :id'
        );
        $bdGet->bindValue(':id', (int)$id["id"], PDO::PARAM_INT);
        $bdGet->bindValue(':nom', $nom, PDO::PARAM_STMT);
        $bdGet->bindValue(':appellation', $appellation, PDO::PARAM_STMT);
        $bdGet->bindValue(':annee', $annee, PDO::PARAM_STMT);
        $bdGet->bindValue(':typev', $typev, PDO::PARAM_STMT);
        $bdGet->bindValue(':region', $region, PDO::PARAM_STMT);
        $bdGet->bindValue(':contenance', $contenance, PDO::PARAM_STMT);
        $bdGet->bindValue(':slug', $slug, PDO::PARAM_STMT);
        $bdGet->bindValue(':pays', $pays, PDO::PARAM_STMT);
        $bdGet->execute();
        return $bdGet;  
    }
}