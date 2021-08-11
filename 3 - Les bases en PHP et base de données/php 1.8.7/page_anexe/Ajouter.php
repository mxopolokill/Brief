<!--Fonction D'ajout-->
<?php
include("../Texture/header2.php");
include("../connexion/connexion.php");
include("../fonction/ajouter2.php");

?>
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


<!--LE FORMULAIRE-->
<div class="container">
    <form method="post" action="">
        <p><strong>Ajouter un URL</strong></p>
        <label for="name">Nom </label>
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
<div class="container">
<form method="post" action="">
    <label for="categorie"><strong>Ajouter catégorie</strong></label>
    <input  class="form-control my-2  bg-primary text-white" type="text" id="Categ_Name" name="Categ_Name" placeholder="catégorie">
       
        <div class="d-grid gap-2 my-2">
        <input  class="btn btn-secondary btn-sm" type="submit"  name="submit" value="Envoyer">
        </div>
</form>
</div>
</body>
</html>