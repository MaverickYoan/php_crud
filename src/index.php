<?php
require_once "connect.php";

// * sql SELECT
$sql = "SELECT * FROM users";

// * préparation de la requête sql
$query = $db->prepare($sql);

// * exécution de la requête sql
$query->execute();

// * récupération des données de la requête sql
$users = $query->fetchAll(PDO::FETCH_ASSOC);

// * afficher la table users
print_r($users);

require "disconnect.php";
?>


<!DOCTYPE html>
<html lang="en">

<!-- HEAD -->

<head>
    <!-- // - 2 - META -->
    <meta charset=utf-8>
    <meta content="width=device-width,initial-scale=1" name=viewport>
    <link rel="icon" href="favicon.ico" type="image/x-svg">
    <link rel="stylesheet" href="style.css">
    <!-- TITRE -->
    <title>Index_php_crud</title>
</head>

<!-- BODY -->

<body id="content">

    <h1>Index</h1>
    <p>créer table sql users</p>

    <h1 style="color:green; font-size:14px;">TABLE SQL users</h1>
    <pre><?php
            // print_r($users)
            ?></pre>
    <!-- // * Table users -->
    <table style="border:1px solid black;">
        <thead style="border:1px solid black;">
            <th style="border:1px solid black;">id</th>
            <th style="border:1px solid black;">first_name</th>
            <th style="border:1px solid black;">last_name</th>
            <!-- <th style="border:1px solid black;">action</th> -->
            <th style="border:1px solid black;">voir</th>
            <th style="border:1px solid black;">supprimer</th>


        </thead>
        <tbody style="border:1px solid black;">
            <tr>
                <td style="border:1px solid black;">999</td>
                <td style="border:1px solid black;">yoan</td>
                <td style="border:1px solid black;">dym</td>
                <!-- <td style="border:1px solid black;">no action</td> -->
                <td><a href="stagiaire.php?id=<?= $user['id'] ?>">Voir</a></td>
                <td><a href="stagiaire.php?id=<?= $user['id'] ?>">Supprimer</a></td>

            </tr>

            <?php
            foreach ($users as $user): ?>

                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['first_name'] ?></td>
                    <td><?= $user['last_name'] ?></td>
                    <td><a href="stagiaire.php?id=<?= $user['id'] ?>">Voir</a></td>
                    <td><a href="stagiaire.php?id=<?= $user['id'] ?>">Supprimer</a></td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>

    <br>
    <img width="10%" src="11919432.gif" alt="gif d'ajout d'utilisateur">
    <br>
    <a href="./add.php"><button>Ajouter un stagiaire</button></a>

    <br>

    <!-- NAVBAR -->
    <nav class="navbar">
        <ul class="nav-links" id="navLinks">
            <li><a class="links" href="http://localhost:8000/stagiaire.php?=0">stagiaire</a></li>
            <li><a class="links" href="http://localhost:8000/index.php">index</a></li>
            <li><a class="links" href="http://localhost:8000/users.php">users</a></li>
            <li><a class="links" href="http://localhost:8000/add.php">Ajout User</a></li>
            <li><a class="links" href="http://localhost:8000/contact.php">Contact</a></li>
            <a href="/">Back to menu</a>
        </ul>
    </nav>


    <hr />

    <?php

    // Affiche toutes les inuserss, comme le ferait INFO_ALL
    // phpinfo();

    // Affiche uniquement le module d'inusers.
    // phpinfo(8) fournirait les mêmes inuserss.
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