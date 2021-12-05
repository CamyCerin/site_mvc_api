<?php
include 'header.php';

if(!empty($_POST["author"])){ //POST
    $request = $pdo->prepare("SELECT * FROM post WHERE author LIKE :author");
    $request->bindParam(':author', $_POST["author"]);
    $request->execute();
}else{ //GET
    $request = $pdo->prepare("SELECT * FROM post");
    $request->execute();
}

$result = $request->fetchAll();

$return["nb"] = count($result);
$return["posts"] = $result;

return_json(true, "Liste des postes", $return);