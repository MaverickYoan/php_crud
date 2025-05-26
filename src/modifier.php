<?php
// * Est-ce que les champs de formulaire sont définis
if (
    isset($_GET["id"])      // Vérifie si la variable 'id' existe dans l'URL (ex: ?id=123)
    && !empty($_GET["id"])  // Vérifie si cette variable n'est pas vide (ex: ?id=)
) {

    // * Définitions de variables
    require_once "connect.php";
    $id = $_GET["id"];
    print_r($id);

    // * sql SELECT
    $sql = "SELECT * FROM interns WHERE id = :id";

    // * préparation de la requête sql
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // * exécution de la requête sql
    $query->execute();

    $stagiaire = $query->fetch();
    // print_r($stagiaire);

    require "disconnect.php";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta Name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modif_php_crud</title>
</head>

<body>

    <img width="10%" src="src\img\user-3-16403 (1).gif" alt="gif d'ajout d'utilisateur">

    <!-- NAVBAR -->
    <nav class="navbar">
        <ul class="nav-links" id="navLinks">
            <li><a class="links" href="http://localhost:8000/stagiaire.php">stagiaire</a></li>
            <li><a class=" links" href="http://localhost:8000/index.php">index</a></li>
            <li><a class="links" href="http://localhost:8000/add.php">Ajout User</a></li>
            <li><a class="links" href="http://localhost:8000/modifier.php">Modifier User</a></li>
            <a href="/">Back to menu</a>
        </ul>
    </nav>

    <p style="border: 1px solid black; width: fit-content; background-color: green; color: white"><b>Modifier un stagiaire</b></p>

    <!-- post envoie en masquer un formulaire -->
    <form method="post">
        <label for="first_name">Prénom</label>
        <!--// * Nous insérons la valeur du prénom du stagiaire dans le champ first_name -->
        <input type="text" Name="first_name" id="first_name" value="<?= $stagiaire["first_name"] ?>" required>
        <label for="last_name">Nom</label>
        <!--// * Nous insérons la valeur du prénom du stagiaire dans le champ last_name -->
        <input type="text" Name="last_name" id="last_name" value="<?= $stagiaire["last_name"] ?>" required>
        <input type="submit" value="Modifier">
    </form>

</body>

</html>

<br /><b>Warning</b>: Undefined variable $stagiaire in <b>/var/www/html/modifier.php</b> on line <b>60</b><br /><br /><b>Warning</b>: Trying to access array offset on null in <b>/var/www/html/modifier.php</b> on line <b>60</b><br />