<?php

// Test de récupération des meilleurs temps en AJAX
// Fichier récupéré : JSON

header('Content-Type: application/json; charset=utf-8');
require_once("../class/service/GetBestTimesService.php");
$db_name = "memory";
$bestTimes = new GetBestTimesService($db_name);
echo $bestTimes->getResponse();