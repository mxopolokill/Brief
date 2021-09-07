<?php
include('../connexion/connexion.php');
include "../Texture/header2.php";

if (!isset($_POST['name']) || ($_POST['url']) || ($_POST['label'])) {
    $update1 = $pdo->prepare('UPDATE bookmarks as l SET l.Fav_Name = :name, l.Link_Data = :url, l.Label = :label WHERE id = :currentid');
    $update1->bindParam(':name', $_POST['name']);
    $update1->bindParam(':url', $_POST['url']);
    $update1->bindParam(':label', $_POST['label']);
    $update1->bindParam(':currentid', $_POST['id']);
    $update1->execute();
    $update1->closeCursor();
};



if (isset($_POST['category'])) {

    $sql = "INSERT INTO liaison (bookmarks , catégorie ) VALUES (" . $_POST['id'] . "," . $_POST['category'] . ")";

    // var_dump($_POST);


    $stmt = $pdo->prepare($sql);
    $res = $stmt->execute();
};




$selection_favories = $pdo->prepare('SELECT l.id as "lienid", l.Fav_Name as "lienname", l.Link_Data as "lienurl", l.Label as "lienlabel" FROM bookmarks as l WHERE l.Id = :currentid');
$selection_favories->bindParam(':currentid', $_GET['id']);
$selection_favories->execute();
$result = $selection_favories->fetch();

$selection_categorie = $pdo->prepare('SELECT c.id as "categoryid", c.Categ_Name as "categoryname" FROM catégorie as c');
$selection_categorie->execute();
$result2 = $selection_categorie->fetchAll();
?>


<form action="./updatebook.php?id=<?php echo $result['lienid'] ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $result['lienid'] ?>">
    <input type="text" name="name" value="<?php echo $result['lienname'] ?>">
    <input type="text" name="url" value="<?php echo $result['lienurl'] ?>">
    <input type="text" name="label" value="<?php echo $result['lienlabel'] ?>"> <br />

    <?php foreach ($result2 as $res) : ?>
        <input type="radio" name="category" value="<?php echo $res['categoryid'] ?>"> <?php echo $res['categoryname'] ?> <br />
    <?php endforeach; ?>

    <input class="btn btn-secondary btn-sm" type="submit">
</form>
<?php

include "../Texture/footer.php";






