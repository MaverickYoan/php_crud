<?php
require_once "connect.php";

// * sql SELECT
$sql = "SELECT * FROM interns";

// * préparation de la requête sql
$query = $db->prepare($sql);

// * exécution de la requête sql
$query->execute();

// * récupération des données de la requête sql
$interns = $query->fetchAll(PDO::FETCH_ASSOC);

// * afficher la table interns
print_r($interns);

require "disconnect.php";
?>


<!DOCTYPE html>
<html lang="en">

<!-- HEAD -->

<head>
    <!-- // - 2 - META -->
    <meta charset=utf-8>
    <meta content="width=device-width,initial-scale=1" name=viewport>
    <link rel="icon" href="src/img/favicon.ico" type="image/x-svg">
    <link rel="stylesheet" href="style.css">
    <!-- TITRE -->
    <title>Index_php_crud</title>
</head>

<!-- BODY -->

<body id="content">

    <h1>Index</h1>
    <p>créer table sql interns</p>

    <h1 style="color:green; font-size:14px;">TABLE SQL interns</h1>

    <!-- // * Table interns -->
    <table style="border:1px solid black;">
        <!-- <pre> -->
        <?php
        print_r($interns)
        ?>
        <!-- </pre> -->
        <thead style="border:1px solid black;">
            <th style="border:1px solid black;">id</th>
            <th style="border:1px solid black;">Prénom</th>
            <th style="border:1px solid black;">Nom</th>
            <th style="border:1px solid black;">Actions</th>
        </thead>
        <tbody style="border:1px solid black;">
            <tr>
                <td style="border:1px solid black;">3</td>
                <td style="border:1px solid black;">yoan</td>
                <td style="border:1px solid black;">ydm</td>
                <td style="border:1px solid black;">no action</td>
            </tr>

            <?php
            foreach ($interns as $stagiaire): ?>

                <tr>
                    <td style="border:1px solid black;"><?= $stagiaire['id'] ?> </td>
                    <td style="border:1px solid black;"><?= $stagiaire['first_name'] ?> </td>
                    <td style="border:1px solid black;"><?= $stagiaire['last_name'] ?> </td>
                    <td style="border:1px solid black;">
                        <a style="border:1px solid black;" href="stagiaire.php?id=<?= $stagiaire['id'] ?>">Voir</a>
                        <a style="border:1px solid black;" href="modifier.php?id=<?= $stagiaire['id'] ?>">Modifier</a>
                        <a style="border:1px solid black;" href="supprimer.php?id=<?= $stagiaire['id'] ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>

    <br>
    <img width="10%" src="src\img\11919432.gif" alt="gif d'ajout d'utilisateur">
    <br>
    <a href="./add.php"><button>Ajouter un stagiaire</button></a>

    <br>

    <?php echo "helluuuuu"; ?>

    <hr>
    <!-- NAVBAR -->
    <nav class="navbar">
        <ul class="nav-links" id="navLinks">
            <li><a class="links" href="http://localhost:8000/stagiaire.php?=0">stagiaire</a></li>
            <li><a class="links" href="http://localhost:8000/index.php">index</a></li>
            <li><a class="links" href="http://localhost:8000/add.php">Ajout User</a></li>
            <li><a class="links" href="http://localhost:8000/modifier.php">Modifier User</a></li>
            <a href="/">Back to menu</a>
        </ul>
    </nav>


    <hr />

    <?php

    // Affiche toutes les infos, comme le ferait INFO_ALL
    // phpinfo();

    // Affiche uniquement le module d'infos.
    // phpinfo(8) fournirait les mêmes infos.
    // phpinfo(INFO_MODULES);

    ?>

    <!-- back-to-top section -------------->
    <a href="#content" class="back-to-top">
        <span>Retour en haut</span>
        <!-- aria-hidden="true" opur masquer l'icon de l'écran -->
        <svg width="18" height="18" viewbox=" 0 0 24 24" aria-hidden="true">
            <path d="M5 12h14" />
            <path d="m12 5 7 7-7 7" />
        </svg>

        <!-- Script Section : Script pour activer le menu mobile -->
        <script src="script.js"></script>

</body>

</html>