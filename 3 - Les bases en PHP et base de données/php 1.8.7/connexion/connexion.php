<!--LA CONNEXION AU PDO-->
<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=bookmark2;charset=utf8', 'root', '');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

