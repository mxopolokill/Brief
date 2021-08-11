
<?php

if (isset($_POST["name"])&& !empty($_POST["name"])){
    try {




        $stmt = $pdo->prepare("INSERT INTO bookmarks (Fav_Name,  Link_Data, Label) VALUES (:fav, :Lien, :label)");

        $stmt->bindParam(':fav', $_POST["name"]);
        $stmt->bindParam(':Lien', $_POST["URL"]);
        $stmt->bindParam(':label', $_POST["Description"]);
        $res = $stmt->execute();

        

        $pdo = null;
    } catch (PDOException $e) {
        echo $e;
    }
}
?>
<?php

if (isset($_POST["Categ_Name"])&& !empty($_POST["Categ_Name"])){
    try {




        $stm = $pdo->prepare("INSERT INTO catégorie (Categ_Name) VALUES (:categ_Name)");

         $stm->bindParam(':categ_Name', $_POST["Categ_Name"]);
      
        $res = $stm->execute();

        

        $pdo = null;
    } catch (PDOException $e) {
        echo $e;
    }
}

