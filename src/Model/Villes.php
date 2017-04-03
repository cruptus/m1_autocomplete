<?php
/**
 * Created by IntelliJ IDEA.
 * User: jelbaz
 * Date: 23/03/2017
 * Time: 14:40
 */

namespace App\Model;


class Villes extends Model
{

    public static function find ($query) {
        $query = strtoupper($query);
        $req = self::bdd()->prepare('SELECT ville_nom FROM villes_france WHERE ville_nom LIKE "'.$query.'%" LIMIT 10');
        $req->execute();
        return $req->fetchAll();
    }
}