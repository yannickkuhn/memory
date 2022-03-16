<?php

// Test de sauvegarde d'un temps de partie en AJAX
// Fichier récupéré : JSON

header('Content-Type: application/json; charset=utf-8');
require_once("../class/ajax/SaveTimeAjaxRequest.php");
$saveTime = new SaveTimeAjaxRequest();
echo $saveTime->getResponse();