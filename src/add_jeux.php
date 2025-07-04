<?php
// * Afficher les données rentrées dans le formualire de $_POST, il utilise le header, si on met dans une même page un header et un print_r ALORS ERREUR
if ($_POST) {
    // * Est-ce que les champs de formulaire sont définis
    if (
        isset($_POST["jeu"])
        && isset($_POST["genre"])
        && isset($_POST["annee"])
        && isset($_POST["image_path"])
        && isset($_POST["image_path_url"])
        // * isset : est present même si vide; !empty oblige à inserer du contenu
        && !empty($_POST["jeu"])
        && !empty($_POST["genre"])
        && !empty($_POST["annee"])
        && !empty($_POST["image_path"])
        && !empty($_POST["image_path_url"])
    ) {
        // print_r(value: $_POST);

        // * Enlève les balises HTML et PHP des STRING
        $jeu = strip_tags($_POST["jeu"]);
        $genre = strip_tags($_POST["genre"]);
        $annee = strip_tags($_POST["annee"]);
        $image_path = strip_tags($_POST["image_path"]);
        $image_path_url = strip_tags($_POST["image_path_url"]);
        // * Check si connexion réussie
        require_once "connect.php";

        // * Requête SQL pour ajouter des données (finir le commentaire)
        $sql = "INSERT INTO jeux (jeu, genre, annee, image_path, image_path_url) VALUES (:jeu, :genre, :annee, :image_path, :image_path_url);";

        // * préparation de la base de données SQL
        $query = $db->prepare($sql);

        // * Rattacher les valeurs de bindValue jeu à la requête SQL
        $query->bindValue(":jeu", $jeu, PDO::PARAM_STR);

        // * Rattacher les valeurs de bindValue genre à la requête SQL
        $query->bindValue(":genre", $genre, PDO::PARAM_STR);

        // * Rattacher les valeurs de bindValue annee à la requête SQL
        $query->bindValue(":annee", $annee, PDO::PARAM_STR);
        $query->bindValue(":image_path", $image_path, PDO::PARAM_STR);
        $query->bindValue(":image_path_url", $image_path_url, PDO::PARAM_STR);

        // * Exécution de la requête SQL
        $query->execute();

        // * récupération des données de la requête sql
        // $jeux = $query->fetchAll(PDO::FETCH_ASSOC);

        // * close de la fonction connexion réussie
        require "disconnect.php";

        // * Renvoyer le nouvel utilisateur à la page d'accueil après ajout
        header("Location: index.php");

        // * Pour terminer toutes exécution de scripts
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta Name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon_enlightment.ico" type="image/x-svg">
    <script type="text/javascript" src="script/script.js"></script>
    <link rel="stylesheet" href="css/test.css">
    <!-- <link rel="stylesheet" href="css/test.css"> -->
    <title>Gamers - Ajouter Jeux</title>
</head>

<body id="content">
    <!-- style="background-image: url('img/tumblr_m04ufu1tXi1r8x1sko1_500.gif'); background-size: 50%; background-repeat: no-repeat;"> -->

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="hamburger-menu" id="hamburgerMenu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul style="font-size: 1rem;" class="nav-links" id="navLinks">
            <li><a class="links" href="http://localhost:8000/index.php">Index</a></li>
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
    <!-- <img id="pacman" width="100%" src="img/tumblr_m04ufu1tXi1r8x1sko1_500.gif" alt="gif de PacMan"> <br> <br> -->

    <section class=""
        style="display: flex; justify-content: center; align-items: center; flex-direction: column; margin-top: 15rem;">

        <form id="form" method="post">
            <label for="jeu">Jeu</label>
            <input type="text" Name="jeu" id="jeu" required> <br> <br>
            <label for="genre">Genre</label>
            <input type="text" Name="genre" id="genre" required> <br> <br>
            <label for="annee">Année</label>
            <input type="text" Name="annee" id="annee" required> <br> <br>
            <label for="editeur_id">Éditeur ID</label>
            <input type="text" Name="editeur_id" id="editeur_id" required> <br> <br>
            <label for="image_path">Image Path</label>
            <input type="text" Name="image_path" id="image_path"> <br> <br>
            <label for="image_path_url">Image URL</label>
            <input type="text" Name="image_path_url" id="image_path_url"> <br> <br>
            <!-- <label for="video">Video</label>
            <input type="text" Name="video" id="video"> <br> <br>
            <label for="description">Description</label>
            <textarea Name="description" id="description"></textarea> <br> <br> -->
            <input type="submit" value="Ajouter">
        </form>

        <br> <br>
        <a href="./contact.php"><button>Contactez-nous</button></a>
        <br>
    </section>

    <!-- // * FOOTER -->
    <footer>
        <div class="droits">
            <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_jeux_Vidéos | @onlineformapro</h6>
        </div>
    </footer>

</body>

</html>