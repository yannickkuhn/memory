<?php
    require_once('../class/database/Database.php');
    use App\Database;

    // Test d'insertion d'un élement dans la base de données

    // -- Variables directement utilisables
    $now = date_create()->format('Y-m-d H:i:s');
    $time = "00:02:30";

    $db = new Database('memory');
    $count = $db->exec("
        INSERT INTO `times` (`id`, `datetime`, `time`) 
        VALUES (NULL, '$now', '$time'); 
    ");
    if($count == 1) {
        echo "<p>Insertion dans la table TIMES réussie !</p>";
    }
    else {
        echo "<p>Problème d'exécution de la requête d'insertion (INSERT INTO)</p>";
    }
