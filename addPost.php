<?php

include 'header.php';

if(!empty($_POST["title"]) && !empty($_POST["content"]) && !empty($_POST["author_id"]) && !empty($_POST["picture"]) ){

    $request = $pdo->prepare("INSERT INTO article (title, content, author_id, created_date, picture) VALUES (:title, :content, :author_id, :created_date, :picture)");
    $request->bindParam(':title', $_POST["title"]);
    $request->bindParam(':content', $_POST["content"]);
    $request->bindParam(':author_id', $_POST["author_id"]);
    $request->bindParam(':picture', $_POST["picture"]);

    $now = new \DateTime();

    $format = $now->format('Y-m-d H:i:s');
    $request->bindParam(':created_date', $format);

    $request->execute();

    return_json(true, "Poste ajouté");
}else{

    return_json(false, "Erreur lors de l'ajout");
}

