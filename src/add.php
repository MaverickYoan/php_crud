<?php
// * Afficher les données rentrées dans le formualire de $_POST
if ($_POST) {
    print_r($_POST);

    // * Définitions de la variable firstName
    $firstName = $_POST["firstName"];

    // * Définitions de la variable lastName
    $lastName = $_POST["lastName"];

    // * Check si connexion réussie
    require_once "connect.php";

    // * Requête SQL pour ajouter des données (finir le commentaire)
    $sql = "INSERT INTO interns (firstName, lastName) VALUES (:firstName, :lastName);";

    // * préparation de la base de données SQL
    $query = $db->prepare($sql);

    // * Rattacher les valeurs de bindValue firstName à la requête SQL
    $query->bindValue(":firstName", $firstName, PDO::PARAM_STR_CHAR);

    // * Rattacher les valeurs de bindValue lastName à la requête SQL
    $query->bindValue(":lastName", $lastName, PDO::PARAM_STR_CHAR);

    // * Exécution de la requête SQL
    $query->execute();

    // * close de la fonction connexion réussie
    require "disconnect.php";

    // * Renvoyer le nouvel utilisateur à la page d'accueil après ajout
    header("Location: src\index.php");

    // * Pour terminer toutes exécution de scripts
    exit;
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
        <label for="firstName">Prénom</label>
        <input type="text" Name="firstName" required>
        <label for="lastName">Nom</label>
        <input type="text" Name="lastName" required>
        <button type="submit">Ajouter</button>
    </form>

</body>

</html>