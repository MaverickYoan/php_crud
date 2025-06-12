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
    <link rel="stylesheet" href="css/style.css">
    <!-- TITRE -->
    <title>Index_php_crud</title>
</head>

<!-- BODY -->

<body id="content" style="background-image: url(img/b3b48a35785465ed53f20d332f191a5c.gif);">

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
                <li><a href="/">Back to menu</a></li>
            </ul>
        </nav>
    </header>

    <h1 style="border:1px solid black; background-color: black; color: white; width:fit-content">Index</h1>
    <p>créer table sql jeux</p>

    <h1 style="color:green; font-size:14px;">TABLE SQL jeux</h1>

    <!-- // * Table jeux -->
    <table style="border:1px solid black;">
        <!-- <pre> -->
        <?php
        // print_r($jeux)
        ?>
        <!-- </pre> -->
        <thead style="border:1px solid black;">
            <th style="border:1px solid black;">id</th>
            <th style="border:1px solid black;">Jeu</th>
            <th style="border:1px solid black;">Genre</th>
            <th style="border:1px solid black;">Actions</th>
        </thead>
        <tbody style="border:1px solid black;">
            <tr>
                <td style="border:1px solid black;">123</td>
                <td style="border:1px solid black;">grid</td>
                <td style="border:1px solid black;">course</td>
                <td style="border:1px solid black;">no action</td>
            </tr>

            <?php
            foreach ($jeux as $jeu): ?>

            <tr>
                <td style="border:1px solid black;"><?= $jeu['id'] ?> </td>
                <td style="border:1px solid black;"><?= $jeu['jeu'] ?> </td>
                <td style="border:1px solid black;"><?= $jeu['genre'] ?> </td>
                <td style="border:1px solid black;">
                    <a style="border:1px solid black;" href="jeu.php?id=<?= $jeu['id'] ?>">Voir</a>
                    <a style="border:1px solid black;" href="modifier.php?id=<?= $jeu['id'] ?>">Modifier</a>
                    <a style="border:1px solid black;" href="supprimer.php?id=<?= $jeu['id'] ?>">Supprimer</a>
                </td>
            </tr>
            <?php endforeach ?>

        </tbody>
    </table>

    <br>
    <img width="10%" src="img/11919432.gif" alt="gif d'ajout d'un jeu vidéo">
    <br>

    <a href="./contact.php"><button>Contactez-nous</button></a>

    <br><br>

    <hr />

    <div style="display: flex; justify-content:center;">
        <?php echo "Merci d'être passé nous voir"; ?>
    </div>

    <hr>


    <hr />

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