<?php
// * Check si connexion réussie
require_once "connect.php";

// * $_POST (superglobale check si l'utilisateur à cliqué sur submit si le form est en method = $_POST)
if ($_POST) {
    if (
        !empty($_POST["jeu"])
        && !empty($_POST["genre"])
        && !empty($_POST["annee"])
    ) {
        $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);
        $jeu = htmlspecialchars(strip_tags($_POST["jeu"]));
        $genre = htmlspecialchars(strip_tags($_POST["genre"]));
        $annee = htmlspecialchars(strip_tags($_POST["annee"]));
        // * Mise à jour des données jeu, genre et annee
        $sql = "UPDATE jeux
        SET jeu = :jeu, genre = :genre, annee = :annee
        WHERE id=:id;";

        $query = $db->prepare($sql);

        // * Rattacher les valeurs de bindValue id à la requête SQL
        $query->bindValue(":id", $id, PDO::PARAM_INT);

        // * Rattacher les valeurs de bindValue jeu à la requête SQL
        $query->bindValue(":jeu", $jeu, PDO::PARAM_STR);

        // * Rattacher les valeurs de bindValue genre à la requête SQL
        $query->bindValue(":genre", $genre, PDO::PARAM_STR);

        // * Rattacher les valeurs de bindValue annee à la requête SQL
        $query->bindValue(":annee", $annee, PDO::PARAM_INT);

        // * Exécution de la requête SQL
        $query->execute();

        // * Renvoyer le nouvel utilisateur à la page d'accueil après ajout
        header("Location: index.php");

        // * Pour terminer toutes exécution de scripts
        exit;
    }
}

// * Est-ce que les champs de formulaire sont définis
if (
    isset($_GET["id"])      // Vérifie si la variable 'id' existe dans l'URL (ex: ?id=123)
    && !empty($_GET["id"])  // Vérifie si cette variable n'est pas vide (ex: ?id=)
) {

    // * Définitions de variables
    $id = $_GET["id"];
    // print_r($id);

    // * sql SELECT 
    $sql = "SELECT * FROM jeux WHERE id = :id";

    // * préparation de la requête sql
    $query = $db->prepare($sql);

    // * Rattacher les valeurs de bindValue id à la requête SQL
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // * exécution de la requête sql
    $query->execute();

    $stagiaire = $query->fetch();
    // print_r($stagiaire);

    require "disconnect.php";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta Name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon_enlightment.ico" type="image/x-svg">
    <link rel="stylesheet" href="css/modifier_jeux.css">
    <script type="text/javascript" src="script/script.js"></script>

    <title>Gamers - Modifier Jeu</title>
</head>

<body id="content"
    style="background-image: url(img/b3b48a35785465ed53f20d332f191a5c.gif); alt:'gif d'ajout d'un jeu vidéo';">

    <!-- <img width=" 10%" src="img/tHi.gif" alt="gif d'un oiseau qui vole"> -->

    <!--  NAVBAR -->
    <nav class="navbar">
        <div class="hamburger-menu" id="hamburgerMenu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul style="font-size: 0.8rem;" class="nav-links" id="navLinks">
            <!-- <li><a class="links" href="http://localhost:8000/stagiaire.php">stagiaire</a></li> -->
            <li><a class="links" href="http://localhost:8000/index.php">index</a></li>
            <li><a class="links" href="http://localhost:8000/liste.php">Liste</a></li>
            <li><a class="links" href="http://localhost:8000/add.php">Ajout User</a></li>
            <li><a class="links" href="http://localhost:8000/modifier_jeux.php">Modifier Jeux</a></li>
            <li><a class="links" href="http://localhost:8000/supprimer.php">Supprimer Jeux</a></li>
            <li><a href="/">Back to index</a></li>
        </ul>
    </nav>

    <!-- * home section -->
    <section class="home">
        <!-- home / h1 / id home / img -->
        <h1 id="home">Gamers</h1>
    </section>

    <!-- * animation plane -->

    <style type="text/css">
    .home,
    #home {
        background: url(images/.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        overflow: hidden;
    }

    .sky {
        position: absolute;
        top: 10%;
        right: 2px;
        animation: sky 30s linear 0s infinite reverse;
        z-index: 99;
    }

    .sky img {
        width: 100px;
    }

    /* trajectoire de l'oiseau */
    @keyframes sky {
        from {
            top: 50px;
            right: -10px;
        }

        to {
            top: 50px;
            right: 100%;
        }
    }
    </style>

    <!-- * fond d'écran -->

    <div class="sky">
        <img src="img/tHi.gif" alt="Image d'un oiseau qui vole">
        <img id="thirdBird" src="img/tHi.gif" alt="Image troisième oiseau qui vole">
        <img id="secondBird" src="img/tHi.gif" alt="Image secondZ oiseau qui vole">
    </div>

    <p style=" border: 1px solid white; background-color: green; color: white"><b>Modifier un
            jeu</b></p>

    <!-- post envoie en masquer un formulaire -->
    <form method="post">
        <label for="jeu">Jeu</label>
        <!--// * Nous insérons la valeur du prénom du stagiaire dans le champ first_name -->
        <input type="text" Name="jeu" id="jeu" value="<?= $jeu["jeu"] ?>" required> <br> <br>
        <label for="genre">Genre</label>
        <!--// * Nous insérons la valeur du prénom du stagiaire dans le champ last_name -->
        <input type="text" Name="genre" id="genre" value="<?= $jeu["genre"] ?>" required> <br>
        <label for="annee">Année</label>
        <input type="text" Name="annee" id="annee" value="<?= $jeu["annee"] ?>" required> <br>
        <!--// * Champ caché -->
        <input type="hidden" name="id" value="<?= $jeu["id"] ?>"> <br>
        <input type="submit" value="Modifier"> <br> <br>
    </form>

    <a href="./contact.php"><button>Contactez-nous</button></a>

    <!-- // * FOOTER -->
    <footer>
        <div class="droits">
            <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_jeux_Vidéos | @onlineformapro</h6>
        </div>
    </footer>

</body>

<script type="text/javascript" src="script/script.js"></script>

</html>