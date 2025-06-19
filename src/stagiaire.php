<?php
// * Est-ce que les champs de formulaire sont définis
if (
    isset($_GET["id"])      // Vérifie si la variable 'id' existe dans l'URL (ex: ?id=123)
    && !empty($_GET["id"])  // Vérifie si cette variable n'est pas vide (ex: ?id=)
) {

    // * Définitions de variables
    require_once "connect.php";
    $id = $_GET["id"];
    print_r($id);

    // * sql SELECT
    $sql = "SELECT * FROM interns WHERE id = :id";

    // * préparation de la requête sql
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // * exécution de la requête sql
    $query->execute();

    $stagiaire = $query->fetch();
    // print_r($stagiaire);

    require "disconnect.php";
}
?>

<!-- http://localhost:8000/stagiaire.php?id=3 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon_enlightment.ico" type="image/x-svg">

    <script type="text/javascript" src="script/script.js"></script>
    <link rel="stylesheet" href="css/test.css">
    <!-- <link rel="stylesheet" href="css/test.css"> -->
    <!-- TITRE -->
    <?php
    // * enlever le isset est possible, !empty evite l'option "utilisateur qui entre une id inexistante dans la BDD", isset ne l'évite pas *
    if (isset($stagiaire) && !empty($stagiaire)):
        // print_r($stagiaire);
    ?>
        <title>Gamers - Page de <?= $stagiaire['first_name'] ?></title>
</head>

<body id="content">
    <!-- NAVBAR -->
    style="background-image: url('img/tumblr_m04ufu1tXi1r8x1sko1_500.gif'); background-size: 50%; background-repeat:
    no-repeat;">

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
            <li><a class="links" href="http://localhost:8000/modifier_jeux.php">Modifier Jeux</a></li>
            <li><a class="links" href="http://localhost:8000/supprimer.php">Supprimer Jeux</a></li>
            <li><a class="links" href="http://localhost:8000/contact.php">Contact</a></li>
            <li><a class="links" href="http://localhost:8000/index.php">Index</a></li>
            <li><a href="/">Back to index</a></li>
        </ul>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <section>
        <img width="10%" src="img/w6a6775zvp661.gif" alt="gif d'ajout d'utilisateur">
        <br>
        <h1 style="border:1px solid white; background-color: black; color: white; width:fit-content">Page de
            l'utilisateur</h1>
        <h1 style="border:1px solid white; width:fit-content"><?= $stagiaire['first_name'] ?></h1>
        <h1 style="border:1px solid white; width:fit-content"><?= $stagiaire['last_name'] ?></h1>
    </section>

    <!-- <p>Prénom : Yo</p>
    <p>Nom : YDM</p> -->

<?php
    else:
?>

    <p>user nok</p>
    <a href="/">Back to index</a>

<?php
    endif;
?>

<a href="./contact.php"><button>Contactez-nous</button></a>

<!-- // * FOOTER -->
<footer>
    <div class="droits">
        <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_jeux_Vidéos | @onlineformapro</h6>
    </div>
</footer>
// * script mobile menu
<script document.addEventListener('DOMContentLoaded', ()=>
    {

        const burger = document.getElementById('hamburgerMenu');
        const links = document.getElementById('navLinks');
        burger.addEventListener('click', function() {
            this.classList.toggle('active');
            links.classList.toggle('active');
        });
    });

    document.getElementById('hamburgerMenu').addEventListener('click', function() {
        this.classList.toggle('active');
        document.getElementById('navLinks').classList.toggle('active');
    }); <
    /

    <
    /body>

    <
    /html>