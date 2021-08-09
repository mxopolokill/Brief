<!--Fonction Modification-->

<?php


$reponse = $bdd->query('SELECT Fav_Name, Link_Data, Label, id FROM bookmarks');


$stmt = $bdd->prepare("UPDATE bookmarks SET Fav_Name = :name, Link_Data = :url,  Label = :label WHERE id = :id");
$stmt->bindParam(':id', $_POST['id']);
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':url', $_POST['url']);
$stmt->bindParam(':label', $_POST['label']);
$stmt->execute();

while ($donnees = $reponse->fetch()) {
?>

<div class="container">

    <div class="">

        <form method="post">

            <input type="hidden" name="id" value="<?php echo $donnees["id"] ?>">

         NOM <input class="form-control my-2  bg-primary text-white" type="text" name="name" value="<?php echo $donnees["Fav_Name"] ?>">
         
           URL <input class="form-control my-2 bg-primary text-white" type="text" name="url" value="<?php echo $donnees["Link_Data"] ?>">
          Description     <input class="form-control my-2 bg-primary text-white" type="text" name="label" value="<?php echo $donnees["Label"] ?>">
          <div class="d-grid gap-2"> 
          <input  class="btn btn-secondary btn-sm" type="submit" name="submit" value="Modifier">
          </div>
        </form>
    </div>
</div>
<?php
}
?>
