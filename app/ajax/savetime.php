<?php

// Test de sauvegarde d'un temps de partie en AJAX
// Fichier récupéré : JSON

$output = array(
    "error" => false,
    "message" => "N/A",
    "output" => "N/A"
);

if(!isset($_POST["time"])) {
    $output["error"] = "Erreur : paramètre time vide !";
    echo json_encode($output);
} else {
    header('Content-Type: application/json; charset=utf-8');
    require_once("../class/service/SaveTimeService.php");

    $db_name = "memory";
    $saveTime = new SaveTimeService($db_name);
    $saveTime->sendRequest($_POST["time"]);
    echo $saveTime->getResponse();
}

