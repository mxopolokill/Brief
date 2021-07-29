<?php

if (isset($_POST["name"]) && !empty($_POST["name"])) {
    try {




        $stmt = $bdd->prepare("INSERT INTO bookmarks (Fav_Name,  Link_Data, Label) VALUES (:fav, :Lien, :label)");

        $stmt->bindParam(':fav', $_POST["name"]);
        $stmt->bindParam(':Lien', $_POST["URL"]);
        $stmt->bindParam(':label', $_POST["Description"]);


        $res = $stmt->execute();



        $bdd = null;
    } catch (PDOException $e) {
        echo $e;
    }
}
