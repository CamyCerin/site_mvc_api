<?php

include 'header.php';

if(!empty($_POST["id"])){
    $request = $pdo->query("DELETE FROM post WHERE id = {$_POST["id"]}");
    return_json(true, "Poste supprimer");
}else{
    return_json(false, "Pas de poste à supprimer");
}
