<?php

// Test de récupération des meilleurs temps en AJAX
// Fichier récupéré : JSON

header('Content-Type: application/json; charset=utf-8');
require_once("../class/ajax/GetBestTimesAjaxRequest.php");
$bestTimes = new GetBestTimesAjaxRequest();
echo $bestTimes->getResponse();