<?php
// * Est-ce que les champs de formulaire sont définis
if (
    isset($_GET["id"])      // Vérifie si la variable 'id' existe dans l'URL (ex: ?id=123)
    && !empty($_GET["id"])  // Vérifie si cette variable n'est pas vide (ex: ?id=)
) {

    // * Définitions de variables
    require_once "connect.php";
    $id = $_GET["id"];
    // print_r($id);

    // * sql SELECT
    $sql = "SELECT * FROM jeux WHERE id = :id";

    // * préparation de la requête sql
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // * exécution de la requête sql
    $query->execute();

    $jeu = $query->fetch();
    // print_r($jeu);

    require "disconnect.php";
}
?>

<!-- http://localhost:8000/jeu.php?id=3 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon_enlightment.ico" type="image/x-svg">
    <link rel="stylesheet" href="css/jeu.css">
    <script src="script/script.js"></script>

    <!-- TITRE -->
    <?php
    // * enlever le isset est possible, !empty evite l'option "utilisateur qui entre une id inexistante dans la BDD", isset ne l'évite pas *
    if (isset($jeu) && !empty($jeu)):
        if (isset($editeur) && !empty($editeur));
        // print_r($jeu);
    ?>
    <title>Gamers - Page de <?= $jeu['jeu'] ?></title>
</head>

<body id="content">


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


    <!-- <img width="10%" src="0Jvtfvy.gif" alt="Gran turismo 2 sur playstation"> -->
    <br>

    <h1 style="border:1px solid black; background-color: black; color: white; width:fit-content">Jeu</h1>
    <h1 style="border:1px solid black; width:fit-content"><?= $jeu['jeu'] ?></h1>
    <h1 style="border:1px solid black; width:fit-content"><?= $jeu['genre'] ?></h1>
    <h1 style="border:1px solid black; width:fit-content"><?= $jeu['annee'] ?></h1>
    <h1 style="border:1px solid black; width:fit-content"><?= $jeu['editeur_id'] ?></h1>
    <img src="img/liste" alt="" />

    <!-- <p>Jeu : Yo</p>
    <p>Nom : YDM</p> -->

    <?php
    else:
?>

    <p>jeu non présent</p>
    <a href="http://localhost:8000/home.php">Back to home</a>

    <?php
    endif;
?>
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
            <li><a class="links" href="http://localhost:8000/liste_avec_images.php">Liste Avec Images</a></li>
            <li><a class="links" href="http://localhost:8000/add.php">Ajout User</a></li>
            <li><a class="links" href="http://localhost:8000/add_jeux.php">Ajout Jeux</a></li>
            <li><a class="links" href="http://localhost:8000/modifier_jeux.php">Modifier Jeux</a></li>
            <li><a class="links" href="http://localhost:8000/supprimer.php">Supprimer Jeux</a></li>
            <li><a class="links" href="http://localhost:8000/contact.php">Contact</a></li>
            <li><a class="links" href="http://localhost:8000/espace_prive.php">espace_prive</a></li>
        </ul>
    </nav>
    </div>
    <li><a href="/">Back to index</a></li>
    </ul>
    </nav>

    <a href="./contact.php"><button>Contactez-nous</button></a>
    <br>
    <br>
    <br>
    <a href="https://fabulous-platypus-fdb4a3.netlify.app" target="_blank"> Netlify WebbApp</a>

    <p>Sites perso</p>
    <a href="https://fabulous-platypus-fdb4a3.netlify.app" target="_blank">Wink Netlify WebbApp</a>
    <a href="https://amazing-puppy-e2c060.netlify.app/" target="_blank">TeK2ouF - Gaming Underground Netlify WebbApp</a>

    <!-- // * FOOTER -->
    <footer>
        <div class=" droits">
            <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_jeux_Vidéos | @onlineformapro</h6>
        </div>
    </footer>

</body>

<script type="text/javascript" src="script/script.js"></script>

</html>