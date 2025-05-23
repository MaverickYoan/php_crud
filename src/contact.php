<?php
// * Check si connexion réussie
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

// * close de la fonction connexion réussie
require "disconnect.php";
?>


<!DOCTYPE html>
<html lang="fr">

<!-- HEAD -->

<head>
    <!-- // - 2 - META -->
    <meta charset=utf-8>
    <meta content="width=device-width,initial-scale=1" name=viewport>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.ico" type="image/x-svg">
    <!-- TITRE -->
    <title>Contact_php_crud</title>
</head>

<!-- BODY -->

<body id="content">

    <h1>Contact</h1>
    <p>créer table sql users</p>

    <h1 style="color:green; font-size:14px;">TABLE SQL users</h1>
    <pre><?php
            print_r($users)
            ?></pre>
    <!-- // * Table users -->
    <table style="border:1px solid black;">
        <thead style="border:1px solid black;">
            <th style="border:1px solid black;">id</th>
            <th style="border:1px solid black;">first_name</th>
            <th style="border:1px solid black;">last_name</th>
            <th style="border:1px solid black;">actions</th>
        </thead>
        <tbody style="border:1px solid black;">
            <tr>
                <td style="border:1px solid black;">123</td>
                <td style="border:1px solid black;">yoan</td>
                <td style="border:1px solid black;">dym</td>
                <td style="border:1px solid black;">noAction</td>
            </tr>

            <?php
            foreach ($users as $intern): ?>
                <tr>
                    <td><?= $intern['id'] ?></td>
                    <td><?= $intern['first_name'] ?></td>
                    <td><?= $intern['last_name'] ?></td>
                    <td><a href="stagiaire.php?id=<?= $intern['id'] ?>">Infos</a></td>

                </tr>
            <?php endforeach ?>

        </tbody>
    </table>



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

    <hr />


    <hr />
    <img width="10%" src="user-3-16403 (1).gif" alt="gif d'utilisateur animé de couleurs">
    <br>

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