<?php
    require_once('../class/database/Database.php');
    require_once('../class/entity/Times.php');
    use App\Database;
    use Entity\Times;

    // test d'insertion d'un élement dans la base de données

    $db = new Database('memory');
    $data = $db->query("SELECT * FROM times ORDER BY time ASC LIMIT 0,3", 'Entity\Times');

    $dataCount = count($data);

    echo "<h2>$dataCount résultat(s) obtenus de la table TIMES :</h2>";

    //var_dump($data);

    foreach($data as $time) {
        echo '<ul>';
        echo "<li>id : $time->id</li>";
        echo "<li>date : {$time->getFormattedDateTime()}</li>";
        echo "<li>temps mis : $time->time</li>";
        echo '</ul>';
    }
    
