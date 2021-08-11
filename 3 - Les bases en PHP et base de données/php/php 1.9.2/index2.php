
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="container">

<table>
    <thead>
        <tr>
           
        </tr>
    </thead>
    <tbody>
<?php
include 'connexion/connexion.php';
include 'Texture/header.php';
include 'fonction/suppression.php';



while ($donnees = $reponse->fetch()) {
    ?>
        <div class="input-group mb-3" action="suppression.php">
            <form method="post">
                <input  type="hidden" name="id" value="<?php echo $donnees["id"] ?>">
                <input class="form-control bg-primary text-white" type="text" name="name" value="<?php echo $donnees["Fav_Name"] ?>">
                <input class="form-control bg-primary text-white" type="text" name="url" value="<?php echo $donnees["Link_Data"] ?>">
                <input class="form-control bg-primary text-white" type="text" name="label" value="<?php echo $donnees["Label"] ?>">
                <input class="form-control bg-primary text-white" type="text" name="Categ_Name" value="<?php echo $donnees["Categ_Name"] ?>">
                <input type="hidden" name='delete' id='delete' value=" . $ligne['id'] . " />
                    <button class="btn btn-secondary btn-sm">Supprimer</button>
            </form>
         
</form>

    <a class="btn btn-secondary btn-sm" href="./page_anexe/updatebook.php?id=<?php echo $donnees['id']?>">Editer</a>
        

                <form action="page_anexe/Ajouter.php">
         <button type="submit" class="btn btn-secondary btn-sm">Ajouter</button>
      </form>
    </div>
<?php
}
?>
    </tbody>
</table>
<?php
include("Texture/footer.php");
?>
</body>
</html>
