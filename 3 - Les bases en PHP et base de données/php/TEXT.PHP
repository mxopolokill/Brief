<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bookmark;charset=utf8', 'root', '');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

$query = $bdd->query("SELECT * FROM bookmarks");

$resultat = $query->fetchAll();

?>

<table>
    <thead>
        <tr>
            <td>Nom</td>
            <td>URL</td>
            <td>Commentaire</td>
        </tr>
    </thead>
    <tbody>
    
        <?php
        foreach ($resultat as $key => $variable) {

            echo "<tr>";
            echo "<td>" . $resultat[$key]['Fav_Name'] . "</td>";
            echo "<td>" . $resultat[$key]['Link_Data'] . "</td>";
            echo "<td>" . $resultat[$key]['Label'] . "</td>";
            echo "<tr>";
        }
        ?>
    </tbody>
</table>
<!--LE FORMULAIRE-->
<div class="container">
    <form method="post" action="">

        <label for="name">Nom</label>
        <input type="text" id="name" name="name" placeholder="Nom favoris">

        <label for="email">URL</label>
        <input type="text" id="URL" name="URL" placeholder="URL">

        <label for="company">Description</label>
        <input type="text" id="Description" name="Description" placeholder="Description">
        



        <input type="submit"  name="submit" value="Envoyer">

    </form>
</div>
<!--Ajout d'information du formulaire-->
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

try{
    $bdd = new PDO("mysql:host=localhost;dbname=bookmark","root","");    
}
catch(PDOException $e){
    echo $e->getMessage();
}


$reponse = $bdd->query('SELECT Fav_Name, Link_Data, Label, id FROM bookmarks');


$stmt = $bdd->prepare("UPDATE bookmarks SET Fav_Name = :name, Link_Data = :url,  Label = :label WHERE id = :id");
$stmt->bindParam(':id', $_POST['id']);
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':url', $_POST['url']);
$stmt->bindParam(':label', $_POST['label']);
$stmt->execute();

while ($donnees = $reponse-> fetch())
{
    ?>
    <div class="case">
        <form  method="post">
            <input type="hidden" name="id" value="<?php echo $donnees["id"]?>">
            <input type="text" name="name" value="<?php echo $donnees["Fav_Name"]?>">
            <input type="text" name="url" value="<?php echo $donnees["Link_Data"]?>">
            <input type="text" name="label" value="<?php echo $donnees["Label"]?>">
            <input type="submit"  name="submit" value="Modifier">
            <input type="hidden" name='delete' id='delete' value=" . $ligne['id'] . " />
            <button class="suppr">Supprimer</button>
        </form>
    </div>
    <?php
}

if (isset($_GET["id"])) {
    $stmt = $pdo->prepare('DELETE FROM bookmarks WHERE id = :id');
    $stmt->bindParam('id', $_GET['id']);
    $stmt->execute();
    $stmt->closeCursor();    
};

