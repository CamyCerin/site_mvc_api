<?php

include 'header.php';

if(!empty($_POST["id"])){
    if(!empty($_POST["title"]) || !empty($_POST["content"])){

        if(!empty($_POST["title"]) && empty($_POST["content"])){
            $request = $pdo->prepare("UPDATE post set title = :title WHERE id = :id ");
            $request->bindParam(':title', $_POST["title"]);
            $request->bindParam(':id',$_POST["id"]);
        }else if(!empty($_POST["content"]) && empty($_POST["title"])) {
            $request = $pdo->prepare("UPDATE post set content = :content WHERE id = :id");
            $request->bindParam(':content', $_POST["content"]);
            $request->bindParam(':id',$_POST["id"]);
        } else{
            $request = $pdo->prepare("UPDATE post set title = :title, content = :content WHERE id = :id");
            $request->bindParam(':title', $_POST["title"]);
            $request->bindParam(':content', $_POST["content"]);
            $request->bindParam(':id',$_POST["id"]);
        }

        $request->execute();

        return_json(true, "Poste modifié");
    }else{
        return_json(true, "Aucune modification");
    }
}else{
    return_json(false, "Pas de poste trouvé");
}
