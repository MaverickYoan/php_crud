<?php
require_once "connect.php";

$id = $_GET["id"];
print_r($id);

$sql = "SELECT * FROM interns WHERE id=";
require "diconnect.php";

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stagiaire.css">
    <title>Yo</title>
</head>

<body>
    <h1>Page de Yo</h1>
    <p>Prénom : Yo</p>
    <p>Nom : YDM</p>
</body>

</html>