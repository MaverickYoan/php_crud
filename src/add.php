<?php
// * Afficher les données rentrées dans le formualire de $_POST
if ($_POST) {
    // print_r($_POST);

    // * Est-ce que les champs de formulaire sont définis
    if (
        isset($_POST["firstname"])
        && isset($_POST["lastname"])
        && !empty($_POST["firstname"])
        && !empty($_POST["lastname"])
    ) {

        // * Enlève les balises HTML et PHP des STRING
        $firstname = strip_tags($_POST["firstname"]);
        $firstname = strip_tags($_POST["lastname"]);

        // * Définition de la variable id
        // $id = $_POST["id"];

        // * Définition de la variable firstname
        $firstname = $_POST["firstname"];

        // * Définition de la variable lastname
        $lastname = $_POST["lastname"];

        // * Check si connexion réussie
        require_once "connect.php";

        // * Requête SQL pour ajouter des données (finir le commentaire)
        $sql = "INSERT INTO users (firstname, lastname) VALUES (:firstname, :lastname)";

        // * préparation de la base de données SQL
        $query = $db->prepare($sql);

        // * Rattacher les valeurs de bindValue id à la requête SQL
        // $query->bindValue(":id", $id, PDO::PARAM_INT);

        // * Rattacher les valeurs de bindValue firstname à la requête SQL
        $query->bindValue(":firstname", $firstname, PDO::PARAM_STR_CHAR);

        // * Rattacher les valeurs de bindValue lastname à la requête SQL
        $query->bindValue(":lastname", $lastname, PDO::PARAM_STR_CHAR);

        // * Exécution de la requête SQL
        $query->execute();

        // * récupération des données de la requête sql
        // $users = $query->fetchAll(PDO::FETCH_ASSOC);

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
    <title>Add_php_crud</title>
</head>

<body>

    <img width="10%" src="user-3-16403 (1).gif" alt="gif d'ajout d'utilisateur">

    <!-- NAVBAR -->
    <nav class="navbar">
        <ul class="nav-links" id="navLinks">
            <li><a class="links" href="http://localhost:8000/stagiaire.php?=0">stagiaire</a></li>
            <li><a class="links" href="http://localhost:8000/index.php">index</a></li>
            <li><a class="links" href="http://localhost:8000/tablenewtest.php">tablenewtest</a></li>
            <li><a class="links" href="http://localhost:8000/add.php">Ajout User</a></li>
            <li><a class="links" href="http://localhost:8000/contact.php">Contact</a></li>
            <a href="/">Back to menu</a>
        </ul>
    </nav>

    <p style="border: 1px solid black; width: fit-content; background-color: green; color: white"><b>Ajouter un stagiaire</b></p>

    <!-- post envoie en masquer un formulaire -->
    <form method="post">
        <label for="firstname">Prénom</label>
        <input type="text" Name="firstname" required>
        <label for="lastname">Nom</label>
        <input type="text" Name="lastname" required>
        <button type="submit">Ajouter</button>
    </form>

</body>

</html>