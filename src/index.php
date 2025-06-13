<?php
require_once "connect.php"; // Assure-toi que ce fichier définit bien $db

if (!isset($db) || !$db) {
    die("Erreur de connexion à la base de données.");
}

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
    <link rel="stylesheet" href="css/index.css">
    <!-- <link rel="stylesheet" href="css/test.css"> -->
    <!-- TITRE -->
    <title>Home</title>
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
                <li><a class="links" href="http://localhost:8000/modifier_jeux.php">Modifier Jeux</a></li>
                <li><a class="links" href="http://localhost:8000/supprimer.php">Supprimer Jeux</a></li>
                <li><a class="links" href="http://localhost:8000/contact.php">Contact</a></li>
                <li><a class="links" href="http://localhost:8000/index.php">Index</a></li>
                <li><a href="/">Back to index</a></li>
            </ul>
        </nav>
    </header>

    <h1 style="border:1px solid black; background-color: black; color: white; width:fit-content">INDEX</h1>
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
    <a href="./add_jeux.php"><button>Ajouter un jeu</button></a>

    <br><br>

    <hr />

    <div style="display: flex; justify-content:center;">
        <?php echo "helluuuuu"; ?>
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

    <a href="./contact.php"><button>Contactez-nous</button></a>

    <!-- Footer Section : Index du site -->
    <footer class=footer>
        <div class=logo>
            <a>
                <img src=logo_jadoo_2bis.svg alt="titre jadoo" class=logo2bis href=https://jadoo.store/#>
            </a>
            <img src=logo_jadoo_1bis.svg alt="icone sushi jadoo" class=logo1bis>
            <br>
        </div>
        </div>


        <!-- Tableau de liens utiles -->
        <div class=table>
            <table>
                <tr>
                    <th>
                        <b class=Restaurant>Site</b>
                    <th>
                        <b class=Restaurant>Ajouter</b>

                <tr>
                    <td class=ligne>

                <tr>
                    <td class=ligne>


                    <td class=ligne>
                        <a class="links" href="http://localhost:8000/add.php">Ajout User</a> <br>

                        <a class="links" href="http://localhost:8000/add_jeux.php">Ajout Jeux</a> <br>

                        <a class="links" href="http://localhost:8000/modifier.php">Modifier Jeux</a> <br>

                        <a class="links" href="http://localhost:8000/supprimer.php">Supprimer Jeux</a> <br>

                        <a class="links" href="http://localhost:8000/jeu.php">jeu</a> <br>


                <tr>
                    <td class=ligne>
                        <a class="links" href="http://localhost:8000/home.php"
                            style=text-decoration:none;color:var(--txtcolor)>home</a> <br>

                        <a class="links" href="http://localhost:8000/index.php"
                            style=text-decoration:none;color:var(--txtcolor)>Index</a> <br>

                        <a class="links" href="http://localhost:8000/liste.php"
                            style=text-decoration:none;color:var(--txtcolor)>Liste</a> <br>

                        <a class="links" href="http://localhost:8000/contact.php"
                            style=text-decoration:none;color:var(--txtcolor)>Contact</a> <br>

            </table>
            <br>

        </div>
    </footer> <br>

    <a href="/">Back to home</a>

    <!-- Droits Section : Informations sur les droits réservés et le créateur -->

    <div class="droits">
        <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_jeux_Vidéos | <a
                href=https://www.onlineformapro.com/ target=_blank> @onlineformapro</a></h6>
    </div>

</body>

<!-- back-to-top section -------------->
<a href="#content" class="back-to-top">
    <span>Retour en haut</span>
    <!-- aria-hidden="true" opur masquer l'icon de l'écran -->
    <svg width="15" height="15" viewbox=" 0 0 24 24" aria-hidden="true">
        <path d="M5 12h14" />
        <path d="m12 5 7 7-7 7" />
    </svg>
    <!-- Script Section : Script pour activer le menu mobile -->
    <script src="script.js"></script>

</html>