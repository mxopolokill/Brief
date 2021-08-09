<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
</body>
</html>
<!--LE FORMULAIRE-->
<div class="container">
    <form method="post" action="">
        
        <label for="name">Nom - Ajouter un URL</label>
        <input class="form-control  bg-primary text-white" type="text" id="name" name="name" placeholder="Nom favoris">

        <label for="email">URL</label>
        <input class="form-control  bg-primary text-white" type="text" id="URL" name="URL" placeholder="URL">

        <label for="company">Description</label>
        <input  class="form-control my-2  bg-primary text-white" type="text" id="Description" name="Description" placeholder="Description">
        


        <div class="d-grid gap-2 my-2">
        <input  class="btn btn-secondary btn-sm" type="submit"  name="submit" value="Envoyer">
        </div>
    </form>
</div>


<!--Fonction D'ajout-->
<?php

if (isset($_POST["name"])&& !empty($_POST["name"])){
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
?>
