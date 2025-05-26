<?php
// * Afficher les données rentrées dans le formualire de $_POST, il utilise le header, si on met dans une même page un header et un print_r ALORS ERREUR
if ($_POST) {
    // * Est-ce que les champs de formulaire sont définis
    if (
        isset($_POST["first_name"])
        && isset($_POST["last_name"])
        // * isset : est present même si vide; !empty oblige à inserer du contenu
        && !empty($_POST["first_name"])
        && !empty($_POST["last_name"])
    ) {
        // print_r(value: $_POST);

        // * Enlève les balises HTML et PHP des STRING
        $first_name = strip_tags($_POST["first_name"]);
        $last_name = strip_tags($_POST["last_name"]);

        // * Check si connexion réussie
        require_once "connect.php";

        // * Requête SQL pour ajouter des données (finir le commentaire)
        $sql = "INSERT INTO interns (first_name, last_name) VALUES (:first_name, :last_name);";

        // * préparation de la base de données SQL
        $query = $db->prepare($sql);

        // * Rattacher les valeurs de bindValue first_name à la requête SQL
        $query->bindValue(":first_name", $first_name, PDO::PARAM_STR);

        // * Rattacher les valeurs de bindValue last_name à la requête SQL
        $query->bindValue(":last_name", $last_name, PDO::PARAM_STR);

        // * Exécution de la requête SQL
        $query->execute();

        // * récupération des données de la requête sql
        // $interns = $query->fetchAll(PDO::FETCH_ASSOC);

        // * close de la fonction connexion réussie
        require "disconnect.php";

        // * Renvoyer le nouvel utilisateur à la page d'accueil après ajout
        header("Location: index.php");

        // * Pour terminer toutes exécution de scripts
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta Name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico" type="image/x-svg">

    <title>Add_php_crud</title>
</head>

<body>

    <img width="10%" src="img/user-3-16403 (1).gif" alt="gif d'ajout d'utilisateur">

    <!-- NAVBAR -->
    <nav class="navbar">
        <ul class="nav-links" id="navLinks">
            <li><a class="links" href="http://localhost:8000/stagiaire.php">stagiaire</a></li>
            <li><a class="links" href="http://localhost:8000/index.php">index</a></li>
            <li><a class="links" href="http://localhost:8000/add.php">Ajout User</a></li>
            <li><a class="links" href="http://localhost:8000/modifier.php">Modifier User</a></li>
            <a href="/">Back to menu</a>
        </ul>
    </nav>

    <p style="border: 1px solid black; width: fit-content; background-color: green; color: white"><b>Ajouter un stagiaire</b></p>

    <!-- post envoie en masquer un formulaire -->
    <form method="post">
        <label for="first_name">Prénom</label>
        <input type="text" Name="first_name" id="first_name" required>
        <label for="last_name">Nom</label>
        <input type="text" Name="last_name" id="last_name" required>
        <input type="submit" value="Ajouter">
    </form>

</body>

<!-- // * FOOTER -->
<footer>
    <div class="droits">
        <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_crud | @onlineformapro | Mentions légales</h6>
    </div>
</footer>

</html>