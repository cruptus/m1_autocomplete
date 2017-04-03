<?php

namespace App\Model;

use PDO;

class Model
{

    protected $className = null;
    protected $valid_item = [];
    protected $errors = [];
    protected $fields = [];

    /**
     * Connexion a la bdd
     * @return PDO
     */
    protected static function bdd (){
        try {
            $pdo = new PDO('mysql:dbname=autocomplete;host=localhost','root','toor');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $pdo;
        } catch (\PDOException $e) {
            var_dump($e);
            die();
        }
    }
    /**
     * Retourne les attributs
     * @param $key
     * @return mixed
     */
    public function __get($key){
        return $this->$key;
    }

    /**
     * Vérifie si tous les attributs correspondent aux normes
     * @return bool
     */
    public function isValid(){
        $value = [];
        foreach($this->valid_item as $key => $message){
            $value[$key] = $this->$key;
        }
        $validator = new Validator($value);

        foreach($this->valid_item as $key => $specification){
            foreach($specification['validation'] as $validation => $message){
                $method = 'is'.ucfirst($validation);
                $validator->$method($key, $message, $specification['required'] ?? true);
            }
        }
        $this->errors = $validator->getErrors();
        return $validator->isValid();
    }

    /**
     * Retourne les erreurs
     * @return array
     */
    public function getErrors(){
        return $this->errors;
    }


    public function save(){
        $attributes = array();
        for($i = 0; $i < count($this->fields); $i++){
            $attribute = $this->fields[$i];
            $attributes[$attribute] = $this->$attribute;
        }
        return App::getDataBase()->insert($this->className, $attributes);
    }
}
