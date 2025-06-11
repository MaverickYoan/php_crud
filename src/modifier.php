<?php
// * Check si connexion réussie
require_once "connect.php";

// * $_POST (superglobale check si l'utilisateur à cliqué sur submit si le form est en method = $_POST)
if ($_POST) {
    if (
        !empty($_POST["first_name"])
        && !empty($_POST["last_name"])
    ) {
        $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);
        $first_name = htmlspecialchars(strip_tags($_POST["first_name"]));
        $last_name = htmlspecialchars(strip_tags($_POST["last_name"]));

        // * Mise à jour des données first_name et/ou last_name
        $sql = "UPDATE interns 
        SET first_name = :first_name, last_name = :last_name 
        WHERE id=:id;";

        $query = $db->prepare($sql);

        // * Rattacher les valeurs de bindValue id à la requête SQL
        $query->bindValue(":id", $id, PDO::PARAM_INT);

        // * Rattacher les valeurs de bindValue first_name à la requête SQL
        $query->bindValue(":first_name", $first_name, PDO::PARAM_STR);

        // * Rattacher les valeurs de bindValue last_name à la requête SQL
        $query->bindValue(":last_name", $last_name, PDO::PARAM_STR);

        // * Exécution de la requête SQL
        $query->execute();

        // * Renvoyer le nouvel utilisateur à la page d'accueil après ajout
        header("Location: index.php");

        // * Pour terminer toutes exécution de scripts
        exit;
    }
}

// * Est-ce que les champs de formulaire sont définis
if (
    isset($_GET["id"])      // Vérifie si la variable 'id' existe dans l'URL (ex: ?id=123)
    && !empty($_GET["id"])  // Vérifie si cette variable n'est pas vide (ex: ?id=)
) {

    // * Définitions de variables
    $id = $_GET["id"];
    // print_r($id);

    // * sql SELECT 
    $sql = "SELECT * FROM interns WHERE id = :id";

    // * préparation de la requête sql
    $query = $db->prepare($sql);

    // * Rattacher les valeurs de bindValue id à la requête SQL
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

<body style="background-image: url(img/tHi.gif); background-repeat: no-repeat;">

    <img width="10%" src="img/user-3-16403 (1).gif" alt="gif d'ajout d'utilisateur">

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="hamburger-menu" id="hamburgerMenu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul class="nav-links" id="navLinks">
            <li><a class="links" href="http://localhost:8000/stagiaire.php">stagiaire</a></li>
            <li><a class="links" href="http://localhost:8000/index.php">index</a></li>
            <li><a class="links" href="http://localhost:8000/liste.php">Liste</a></li>
            <li><a class="links" href="http://localhost:8000/add.php">Ajout User</a></li>
            <li><a class="links" href="http://localhost:8000/modifier.php">Modifier User</a></li>
            <li><a class="links" href="http://localhost:8000/supprimer.php">Supprimer User</a></li>
            <li><a href="/">Back to menu</a></li>
        </ul>
    </nav>

    <p style="border: 1px solid black; width: fit-content; background-color: yellow; color: black"><b>Modifier un
            stagiaire</b></p>

    <!-- post envoie en masquer un formulaire -->
    <form method="post">
        <label for="first_name">Prénom</label>
        <!--// * Nous insérons la valeur du prénom du stagiaire dans le champ first_name -->
        <input type="text" Name="first_name" id="first_name" value="<?= $stagiaire["first_name"] ?>" required>
        <label for="last_name">Nom</label>
        <!--// * Nous insérons la valeur du prénom du stagiaire dans le champ last_name -->
        <input type="text" Name="last_name" id="last_name" value="<?= $stagiaire["last_name"] ?>" required>
        <!--// * Champ caché -->
        <input type="hidden" name="id" value="<?= $stagiaire["id"] ?>">
        <input type="submit" value="Modifier">
    </form>

</body>

<!-- // * FOOTER -->
<footer>
    <div class="droits">
        <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_crud | @onlineformapro | Mentions légales
        </h6>
    </div>
</footer>

</html>