<?php
header('Content-Type: application/json'); //Informe que même si nous sommes dans un php file on informe que les affichages seront du json

try{
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=api_mvc;', 'root', '');
}catch (Exception $e){
    return_json(false, "Erreur lors de la connexion à la base de données");
}

function return_json($success, $content, $results=null){
    $return["success"] = $success;
    $return["message"] = $content;
    $return["result"] = $results;

    echo json_encode($return);
}