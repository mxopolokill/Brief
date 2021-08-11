<!--Fonction Modification-->

<?php
include "../connexion/connexion.php";
$reponse = $pdo->query('SELECT Fav_Name, Link_Data, Label, id FROM bookmarks');


$stmt = $pdo->prepare("UPDATE bookmarks SET Fav_Name = :name, Link_Data = :url,  Label = :label WHERE id = :id");
$stmt->bindParam(':id', $_POST['id']);
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':url', $_POST['url']);
$stmt->bindParam(':label', $_POST['label']);
$stmt->execute();





$smt = $pdo->prepare("SELECT c.Categ_Name as 'name category', c.id as 'id category' FROM catégorie as c");
$smt->execute();
$smtresult = $smt->fetchAll();

  $rep = $pdo->prepare("SELECT c.Categ_Name as Categ_Name, l.Fav_Name as Fav_Name, l.Label as Label, l.Link_Data as Link_Data, l.id as id FROM bookmarks as l inner join liaison AS lc ON l.id = lc.bookmarks inner join catégorie AS c ON c.id = lc.catégorie");
 
  $rep->execute();
 
  $donnees = $rep->fetchAll();




  $stmt = $pdo->prepare("UPDATE bookmarks, SET Fav_Name = :name, Link_Data = :url,  Label = :label WHERE id = :id;
                         UPDATE catégorie SET Categ_Name= :Categ_Name WHERE id= :idd");
  $stmt->bindParam(':id', $_POST['id']);
  $stmt->bindParam(':idd', $_POST['idd']);
  $stmt->bindParam(':name', $_POST['name']);
  $stmt->bindParam(':url', $_POST['url']);
  $stmt->bindParam(':label', $_POST['label']);
  $stmt->bindParam(':Categ_Name', $_POST['Categ_Name']);
$stmt->execute();



?>
<?php
while ($donnees = $rep->fetch()) {
?>

<div class="container">

    <div class="">

        <form method="post">

            <input type="text" name="id" value="<?php echo $donnees["id"] ?>">
            <input type="text" name="idd" value="<?php echo $donnees["idd"] ?>">

         NOM <input class="form-control my-2  bg-primary text-white" type="text" name="name" value="<?php echo $donnees["Fav_Name"] ?>">
         
           URL <input class="form-control my-2 bg-primary text-white" type="text" name="url" value="<?php echo $donnees["Link_Data"] ?>">
          Description     <input class="form-control my-2 bg-primary text-white" type="text" name="label" value="<?php echo $donnees["Label"] ?>">
          <div class="d-grid gap-2"> 
          Catégorie <input class="form-control my-2 bg-primary text-white" type="text" name="Categ_Name" value="<?php echo $donnees["Categ_Name"] ?>">
          <input  class="btn btn-secondary btn-sm" type="submit" name="submit" value="Modifier">
          </div>
        </form>
    </div>
</div>
<?php
}
?>
