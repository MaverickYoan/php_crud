<?php
require_once "connect.php";

$id = $_GET["id"];
print_r($id);

// * sql SELECT
$sql = "SELECT * FROM interns WHERE id = :id";

// * préparation de la requête sql
$query = $db->prepare($sql);
$query->bindValue(":id", $id, PDO::PARAM_INT);

// * exécution de la requête sql
$query->execute();

$intern = $query->fetch();
print_r($intern);

require "diconnect.php";

?>
<!-- http://localhost:8000/stagiaire.php?id=3 -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stagiaire.css">
    <link rel="icon" href="1175127.webp" type="image/x-svg">

    <title><?= $intern["firstName"] ?></title>
</head>

<body>
    <h1>Page de io</h1>
    <p>Prénom : Yo</p>
    <p>Nom : YDM</p>
    <a href="/">Back to menu</a>
</body>

</html>