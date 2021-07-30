<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=bookmark", "root", "");
} catch (PDOException $e) {
    echo $e->getMessage();
}

$reponse = $bdd->query('SELECT Fav_Name, Link_Data, Label, id FROM bookmarks');


$stmt = $bdd->prepare("UPDATE bookmarks SET Fav_Name = :name, Link_Data = :url,  Label = :label WHERE id = :id");
$stmt->bindParam(':id', $_POST['id']);
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':url', $_POST['url']);
$stmt->bindParam(':label', $_POST['label']);
$stmt->execute();

while ($donnees = $reponse->fetch()) {
?>
    <div class="case">
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $donnees["id"] ?>">
            <input type="text" name="name" value="<?php echo $donnees["Fav_Name"] ?>">
            <input type="text" name="url" value="<?php echo $donnees["Link_Data"] ?>">
            <input type="text" name="label" value="<?php echo $donnees["Label"] ?>">
            <input  class="btn btn-secondary btn-sm" type="submit" name="submit" value="Modifier">
        </form>
    </div>
<?php
}
?>