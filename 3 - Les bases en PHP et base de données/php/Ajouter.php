<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bookmark;charset=utf8', 'root', '');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

?>
<!--LE FORMULAIRE-->
<div class="container">
    <form method="post" action="">

        <label for="name">Nom</label>
        <input type="text" id="name" name="name" placeholder="Nom favoris">

        <label for="email">URL</label>
        <input type="text" id="URL" name="URL" placeholder="URL">

        <label for="company">Description</label>
        <input type="text" id="Description" name="Description">
        



        <input  class="btn btn-secondary btn-sm" type="submit"  name="submit" value="Envoyer">

    </form>
</div>
<?php

if (isset($_POST["name"])&& !empty($_POST["name"])){
    try {




        $stmt = $bdd->prepare("INSERT INTO bookmarks (Fav_Name,  Link_Data, Label) VALUES (:fav, :Lien, :label)");

        $stmt->bindParam(':fav', $_POST["name"]);
        $stmt->bindParam(':Lien', $_POST["URL"]);
        $stmt->bindParam(':label', $_POST["Description"]);

        $res = $stmt->execute();

        

        $bdd = null;
    } catch (PDOException $e) {
        echo $e;
    }
}
