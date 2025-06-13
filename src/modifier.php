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
    <link rel="icon" href="img/favicon_enlightment.ico" type="image/x-svg">
    <link rel="stylesheet" href="css/modifier.css">

    <title>Gamers - modif_php_crud</title>
</head>

<body id="content" style="background-image: url(img/b3b48a35785465ed53f20d332f191a5c.gif);">

    <img width="10%" src="img/tHi.gif" alt="gif d'ajout d'utilisateur">

    <!--  NAVBAR -->
    <nav class="navbar">
        <div class="hamburger-menu" id="hamburgerMenu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul style="font-size: 0.8rem;" class="nav-links" id="navLinks">
            <!-- <li><a class="links" href="http://localhost:8000/stagiaire.php">stagiaire</a></li> -->
            <li><a class="links" href="http://localhost:8000/index.php">index</a></li>
            <li><a class="links" href="http://localhost:8000/liste.php">Liste</a></li>
            <li><a class="links" href="http://localhost:8000/add.php">Ajout User</a></li>
            <li><a class="links" href="http://localhost:8000/modifier_jeux.php">Modifier Jeux</a></li>
            <li><a class="links" href="http://localhost:8000/supprimer.php">Supprimer Jeux</a></li>
            <li><a href="/">Back to index</a></li>
        </ul>
    </nav>

    <p style="border: 1px solid white; width: fit-content; background-color: green; color: white">
        <b>Modifier un jeu</b>
    </p>

    <!-- post envoie en masquer un formulaire -->
    <form method="post">
        <label for="first_name">Prénom</label>
        <!--// * Nous insérons la valeur du prénom du stagiaire dans le champ first_name -->
        <input type="text" Name="first_name" id="first_name" value="<?= $stagiaire["first_name"] ?>" required> <br> <br>
        <label for="last_name">Nom</label>
        <!--// * Nous insérons la valeur du prénom du stagiaire dans le champ last_name -->
        <input type="text" Name="last_name" id="last_name" value="<?= $stagiaire["last_name"] ?>" required> <br>
        <!--// * Champ caché -->
        <input type="hidden" name="id" value="<?= $stagiaire["id"] ?>"> <br>
        <input type="submit" value="Modifier"> <br> <br>
    </form>

    <a href="./contact.php"><button>Contactez-nous</button></a>

    <!-- // * FOOTER -->
    <footer>
        <div class="droits">
            <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_jeux_Vidéos | @onlineformapro</h6>
        </div>
    </footer>

</body>

<script type="text/javascript" src="script/script.js"></script>

</html>