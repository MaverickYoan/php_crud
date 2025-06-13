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
    <title>Index_php_crud</title>
</head>

<!-- BODY -->

<body id="content" style="background-image: // * url(img/b3b48a35785465ed53f20d332f191a5c.gif);">

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
                <li><a class="links" href="http://localhost:8000/modifier.php">Modifier Jeux</a></li>
                <li><a class="links" href="http://localhost:8000/supprimer.php">Supprimer Jeux</a></li>
                <li><a class="links" href="http://localhost:8000/contact.php">Contact</a></li>
                <li><a class="links" href="http://localhost:8000/index.php">Index</a></li>
                <li><a href="/">Back to index</a></li>
            </ul>
        </nav>
    </header>


    <!-- partial:index.partial.html -->
    <svg width="0" height="0">
        <!-- default filter area is just 110% of element, enlarge-->
        <filter id="goo" x="-50%" y="-50%" width="200%" height="200%">
            <!-- push all pixels with alpha < .5 to be fully transparent-->
            <!-- and all others to be fully opaque-->
            <feComponentTransfer>
                <feFuncA type="discrete" tableValues="0 1"></feFuncA>
            </feComponentTransfer>
            <!-- use the tiniest px blur possible to get rid of edge jaggedness-->
            <feGaussianBlur stdDeviation="3"></feGaussianBlur>
            <!-- get rid of edge blurriness -->
            <!-- by reducing the number of semitransparent pixels-->
            <!-- alphas in the [0, 1] interval get mapped to the [-2, 3] one-->
            <!-- then values get clamped to [0, 1] anyway-->
            <feComponentTransfer>
                <feFuncA type="table" tableValues="-2 3"></feFuncA>
            </feComponentTransfer>
        </filter>
    </svg>
    <div class="goo">
        <div class="particle"></div>
        <div class="particle"></div>
    </div>
    <!-- partial -->

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

    <!-- // * FOOTER -->
    <footer>
        <div class="droits">
            <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_jeux_Vidéos | @onlineformapro</h6>
        </div>
    </footer>

</body>

</html>