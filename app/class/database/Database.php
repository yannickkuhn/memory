<?php

namespace App;
use \PDO;

class Database {
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost') {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO() {
        // On initialise une seule fois la variable PDO, si elle n'existe pas
        // pour éviter de rentrer dans la boucle plusieurs fois s'il y a plusieurs
        // requêtes SQL executées ...
        if($this->pdo == null) {
            $pdo = new PDO('mysql:dbname='.$this->db_name.';host='.$this->db_host,$this->db_user,$this->db_pass);
            // Cette commande permet de voir les erreurs SQL si jamais il y a des 
            // erreurs de syntaxe SQL (en mode dev)
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($statement, $class) {
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_CLASS, $class);
        return $datas;
    }

    public function exec($statement) {
        $count = $this->getPDO()->exec($statement);
        return $count;
    }
}
