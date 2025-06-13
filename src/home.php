<?php
require_once "connect.php";

// * sql SELECT
$sql = "SELECT * FROM jeux";

// * préparation de la requête sql
$query = $db->prepare($sql);

// * exécution de la requête sql
$query->execute();

// * récupération des données de la requête sql
$jeux = $query->fetchAll(PDO::FETCH_ASSOC);

// * afficher la table jeux
// print_r($jeux);

require "disconnect.php";
?>


<!DOCTYPE html>
<html lang="en">

<!-- HEAD -->

<head>
    <!-- // - 2 - META -->
    <meta charset=utf-8>
    <meta content="width=device-width,initial-scale=1" name=viewport>
    <link rel="icon" href="img/favicon_enlightment.ico" type="image/x-svg">
    <script type="text/javascript" src="script/script.js"></script>
    <link rel="stylesheet" href="css/home.css">
    <!-- TITRE -->
    <title>Gamers - Home</title>
</head>

<!-- BODY -->

<body id="content"
    style="background-image: url(img/logoTeK2OuF.jpg); background-size: cover; background-attachment: fixed;">

    <!-- header -->
    <header>
        <!-- NAVBAR -->
        <nav class="navbar">
            <div class="hamburger-menu" id="hamburgerMenu">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <ul style="font-size: 1rem;" class="nav-links" id="navLinks">
                <li><a class="links" href="http://localhost:8000/jeu.php">jeu</a></li>
                <li><a class="links" href="http://localhost:8000/home.php">home</a></li>
                <li><a class="links" href="http://localhost:8000/liste.php">Liste</a></li>
                <li><a class="links" href="http://localhost:8000/add.php">Ajout User</a></li>
                <li><a class="links" href="http://localhost:8000/add_jeux.php">Ajout Jeux</a></li>
                <li><a class="links" href="http://localhost:8000/modifier_jeux.php">Modifier Jeux</a></li>
                <li><a class="links" href="http://localhost:8000/supprimer.php">Supprimer Jeux</a></li>
                <li><a class="links" href="http://localhost:8000/contact.php">Contact</a></li>
                <li><a class="links" href="http://localhost:8000/index.php">Index</a></li>
                <li><a href="/">Back to index</a></li>
            </ul>
        </nav>
    </header>

    <br><br>

    <div style="display: flex; justify-content:center;">
        <?php echo "Merci d'passer nous voir"; ?>
    </div>

    <?php

    // Affiche toutes les infos, comme le ferait INFO_ALL
    // phpinfo();

    // Affiche uniquement le module d'infos.
    // phpinfo(8) fournirait les mêmes infos.
    // phpinfo(INFO_MODULES);

    ?>

    <p>Sites perso</p>
    <a href="https://fabulous-platypus-fdb4a3.netlify.app" target="_blank">Wink Netlify WebbApp</a>
    <a href="https://amazing-puppy-e2c060.netlify.app/" target="_blank">TeK2ouF - Gaming Underground Netlify WebbApp</a>

    <!-- // * FOOTER -->
    <footer>
        <div class="droits">
            <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_jeux_Vidéos | @onlineformapro</h6>
        </div>
    </footer>

</body>

</html>