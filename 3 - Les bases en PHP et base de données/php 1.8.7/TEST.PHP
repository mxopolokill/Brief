<?php


$smt = $pdo->prepare("SELECT c.Categ_Name as 'name category', c.id as 'id category' FROM catégorie as c");
$smt->execute();
$smtresult = $smt->fetchAll();

  $rep = $pdo->prepare("SELECT c.Categ_Name as Categ_Name, l.Fav_Name as Fav_Name, l.Label as Label, l.Link_Data as Link_Data, l.id as id FROM bookmarks as l inner join liaison AS lc ON l.id = lc.bookmarks inner join catégorie AS c ON c.id = lc.catégorie");
 
  $rep->execute();
  $rep->closeCursor();
  $donnees = $rep->fetchAll();




  $stmt = $pdo->prepare("UPDATE bookmarks SET Fav_Name = :name, Link_Data = :url,  Label = :label WHERE id = :id");

  $stmt->bindParam(':id', $_POST['id']);
  $stmt->bindParam(':name', $_POST['name']);
  $stmt->bindParam(':url', $_POST['url']);
  $stmt->bindParam(':label', $_POST['label']);

$stmt->execute();
$stmt->closeCursor();
?>

<?php

if(isset($_POST['Fav_Name'])&& isset($_POST['Link_data'])&& isset($_POST['id'])&& isset($_POST['id_categories'])&& isset($_POST['Label']))
{
    $stmt2='UPDATE bookmark SET Fav_Name=:name, Link_Data=:url, Label =:Label WHERE id=:id';



    $reqet = $pdo->prepare($stmt2);
    
    $reqet->execute(array('id'=> $_POST['id'], 'name'=> $_POST['Fav_Name'], 'url'=> $_POST['Link_Data'], 'Label'=> $_POST['Label']));
    $reqet = $rep->fetchAll();

    $stmt3='DELETE FROM liaison WHERE id= :id';
    $test = $pdo->prepare($stmt3);
    $test->execute(['id'=>$_POST['id']]);
    $test = $rep->fetchAll();


    $insert='INSERT INTO liaison (bookmarks, catégorie) VALUES (:id_link, :id_categorie)';
    $inserting = $pdo->prepare($insert);
    foreach($_POST['id_categories'] as $id_cat){
        $inserting->execute(array('id_categorie'=>$id_cat, 'id_link'=>$_POST['id']));
    }
    $inserting = $rep->fetchAll();
}
?>