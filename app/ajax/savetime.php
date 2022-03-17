<?php

// Test de sauvegarde d'un temps de partie en AJAX
// Fichier récupéré : JSON

header('Content-Type: application/json; charset=utf-8');
require_once("../class/service/SaveTimeService.php");

$db_name = "memory";
$saveTime = new SaveTimeService($db_name);
$saveTime->sendRequest("00:02:09");
echo $saveTime->getResponse();