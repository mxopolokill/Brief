<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Suppression Bookmark</title>
</head>
<body>

<!--Fonction Suppression-->
    <?php

$reponse = $bdd->query('SELECT Fav_Name, Link_Data, Label, id FROM bookmarks');


$stmt = $bdd->prepare("DELETE FROM bookmarks WHERE id=:id");
$stmt->bindParam(':id', $_POST['id']);
$stmt->execute();
?>
</body>
</html>



