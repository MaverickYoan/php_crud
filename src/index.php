<?php
require_once("connect.php");

// * sql SELECT
$sql = "SELECT * FROM interns";

// * préparation de la requête sql
$query = $db->prepare($sql);

// * préparation de la requête sql

// * exécution de la requête sql
$query->execute();

// * récupération des données de la requête sql
$interns = $query->fetchAll(PDO::FETCH_ASSOC);

// * afficher la table interns
print_r($interns);
?>


<!DOCTYPE html>
<html lang="fr">

<!-- HEAD -->

<head>
    <!-- // - 2 - META -->
    <meta charset=utf-8>
    <meta content="width=device-width,initial-scale=1" name=viewport>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.png" type="image/x-png">
    <title>php_crud</title><!-- TITRE -->
</head>

<!-- BODY -->

<body id="content">
    <h1>test</h1>
    <p>créer table sql interns</p>

    <h1 style="color:green; font-size:14px;">TABLE SQL interns</h1>

    <table style="border:1px solid black;">
        <thead style="border:1px solid black;">
            <th style="border:1px solid black;">id</th>
            <th style="border:1px solid black;">firstName</th>
            <th style="border:1px solid black;">lastName</th>
            <th style="border:1px solid black;">actions</th>
        </thead>
        <tbody style="border:1px solid black;">
            <tr>
                <td style="border:1px solid black;">0</td>
                <td style="border:1px solid black;">yoan</td>
                <td style="border:1px solid black; display: flex; justify-content: center;">dym</td>
                <td style="border:1px solid black;">noAction</td>
            </tr>
        </tbody>
    </table>



    <!-- NAVBAR -->
    <nav class="navbar">
        <ul class="nav-links" id="navLinks">
            <li><a class="links" href="#welcome">Home</a></li>
            <li><a class="links" href="#shop">Shop</a></li>
            <li><a class="links" href="#contact">Contact</a></li>
        </ul>
    </nav>

    <hr />



    <?php

    // Affiche toutes les informations, comme le ferait INFO_ALL
    // phpinfo();

    // Affiche uniquement le module d'information.
    // phpinfo(8) fournirait les mêmes informations.
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