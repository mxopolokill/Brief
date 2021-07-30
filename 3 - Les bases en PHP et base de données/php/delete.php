<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="container">
<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bookmark;charset=utf8', 'root', '');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
?>

<?php
include 'suppression.php';
while ($donnees = $reponse->fetch()) {
?>
    <div class="input-group mb-3" action="suppression.php">
        <form method="post">
            <input  type="hidden" name="id" value="<?php echo $donnees["id"] ?>">
            <input class="form-control" type="text" name="name" value="<?php echo $donnees["Fav_Name"] ?>">
            <input class="form-control" type="text" name="url" value="<?php echo $donnees["Link_Data"] ?>">
            <input class="form-control" type="text" name="label" value="<?php echo $donnees["Label"] ?>">
            <input type="hidden" name='delete' id='delete' value=" . $ligne['id'] . " />
                <button class="btn btn-primary">Supprimer</button>
        </form>
    </div>
<?php
}
?>


</body>
</html>
