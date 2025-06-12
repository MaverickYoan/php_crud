<?php
// * Afficher les données rentrées dans le formualire de $_POST, il utilise le header, si on met dans une même page un header et un print_r ALORS ERREUR
if ($_POST) {
    // * Est-ce que les champs de formulaire sont définis
    if (
        isset($_POST["jeu"])
        && isset($_POST["genre"])
        && isset($_POST["annee"])
        // * isset : est present même si vide; !empty oblige à inserer du contenu
        && !empty($_POST["jeu"])
        && !empty($_POST["genre"])
        && !empty($_POST["annee"])
    ) {
        // print_r(value: $_POST);

        // * Enlève les balises HTML et PHP des STRING
        $jeu = strip_tags($_POST["jeu"]);
        $genre = strip_tags($_POST["genre"]);
        $annee = strip_tags($_POST["annee"]);
        // * Check si connexion réussie
        require_once "connect.php";

        // * Requête SQL pour ajouter des données (finir le commentaire)
        $sql = "INSERT INTO jeux (jeu, genre, annee) VALUES (:jeu, :genre, :annee);";

        // * préparation de la base de données SQL
        $query = $db->prepare($sql);

        // * Rattacher les valeurs de bindValue jeu à la requête SQL
        $query->bindValue(":jeu", $jeu, PDO::PARAM_STR);

        // * Rattacher les valeurs de bindValue genre à la requête SQL
        $query->bindValue(":genre", $genre, PDO::PARAM_STR);

        // * Rattacher les valeurs de bindValue annee à la requête SQL
        $query->bindValue(":annee", $annee, PDO::PARAM_STR);

        // * Exécution de la requête SQL
        $query->execute();

        // * récupération des données de la requête sql
        // $jeux = $query->fetchAll(PDO::FETCH_ASSOC);

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
    <script type="text/javascript" src="script/script.js"></script>
    <link rel="stylesheet" href="css/style.css">

    <title>Add_php_crud</title>
</head>

<body style="background-image: url(img/totoro.gif); background-repeat: no-repeat; background-position: right;">

    <img width="10%" src="" alt="gif d'ajout de jeux vidéo">

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="hamburger-menu" id="hamburgerMenu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul style="font-size: 0.8rem;" class="nav-links" id="navLinks">
            <!-- <li><a class="links" href="http://localhost:8000/stagiaire.php">stagiaire</a></li> -->
            <li><a class="links" href="http://localhost:8000/jeu.php">jeu</a></li>
            <li><a class="links" href="http://localhost:8000/home.php">home</a></li>
            <li><a class="links" href="http://localhost:8000/liste.php">Liste</a></li>
            <li><a class="links" href="http://localhost:8000/add.php">Ajout User</a></li>
            <li><a class="links" href="http://localhost:8000/add_jeux.php">Ajout Jeux</a></li>
            <li><a class="links" href="http://localhost:8000/modifier.php">Modifier Jeux</a></li>
            <li><a class="links" href="http://localhost:8000/supprimer.php">Supprimer Jeux</a></li>
            <li><a class="links" href="http://localhost:8000/contact.php">Contact</a></li>
            <li><a class="links" href="http://localhost:8000/index.php">Index</a></li>
            <li><a href="/">Back to menu</a></li>
        </ul>
    </nav>

    <p style="border: 1px solid black; width: fit-content; background-color: green; color: white"><b>Ajouter un jeu</b>
    </p>

    <!-- post envoie en masquer un formulaire -->
    <form method="post">
        <label for="jeu">Jeu</label>
        <input type="text" Name="jeu" id="jeu" required>
        <label for="genre">Genre</label>
        <input type="text" Name="genre" id="genre" required>
        <label for="annee">Année</label>
        <input type="text" Name="annee" id="annee" required>
        <input type="submit" value="Ajouter">
    </form>

    <a href="./contact.php"><button>Contactez-nous</button></a>

    <!-- // * FOOTER -->
    <footer>
        <div class="droits">
            <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_jeux_Vidéos | @onlineformapro</h6>
        </div>
    </footer>

</body>

</html>