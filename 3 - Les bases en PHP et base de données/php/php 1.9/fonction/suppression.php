
<!--Fonction Suppression-->
<?php


$reponse = $pdo->prepare('SELECT c.Categ_Name as Categ_Name, l.Fav_Name as Fav_Name, l.Label as Label, l.Link_Data as Link_Data, l.id as "id", C.id as idd FROM bookmarks as l 
left join liaison AS lc ON l.id = lc.bookmarks 
left join catégorie AS c ON c.id = lc.catégorie');
$reponse->execute();



$stmt = $pdo->prepare("DELETE FROM bookmarks WHERE id =:id");
$stmt->bindParam(':id', $_POST['id']);
$stmt->execute();
?>


<!--Fonction Suppression-->
<?php


$rep = $pdo->prepare('SELECT c.Categ_Name as Categ_Name, l.Fav_Name as Fav_Name, l.Label as Label, l.Link_Data as Link_Data, l.id as "id", C.id as idd FROM bookmarks as l 
left join liaison AS lc ON l.id = lc.bookmarks 
left join catégorie AS c ON c.id = lc.catégorie');
$rep->execute();



$stm = $pdo->prepare("DELETE FROM liaison WHERE id =:id");
$stm->bindParam(':id', $_POST['id']);
$stm->execute();
?>



