<?php
    require_once('../class/database/Database.php');
    use App\Database;

    $db = new Database('memory');
    $db->exec("
        CREATE TABLE times
        (
            id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
            datetime DATETIME NOT NULL,
            time TIME NOT NULL
        );
    ");
    echo "<p>Création de la table TIMES réussi !</p>";