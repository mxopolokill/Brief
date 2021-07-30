<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Bookmark</title>
   
</head>
<body>
    
</body>
</html>
<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bookmark;charset=utf8', 'root', '');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
?>

<tr>
<td>Nom</td>
<td>URL</td>
<td>Commentaire</td>
</tr>

<?php
include("connexion.php");
include("modifier.php"); 
include("ajouter.php"); 
?>
<input class="btn btn-primary" type=button onclick=window.location.href='delete.php'; value="Supprimer valeur"/>
