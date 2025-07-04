<?php
// * Afficher les données rentrées dans le formualire de $_POST, il utilise le header, si on met dans une même page un header et un print_r ALORS ERREUR
if ($_POST) {
    // * Est-ce que les champs de formulaire sont définis
    if (
        isset($_POST["first_name"])
        && isset($_POST["last_name"])
        // * isset : est present même si vide; !empty oblige à inserer du contenu
        && !empty($_POST["first_name"])
        && !empty($_POST["last_name"])
    ) {
        // print_r(value: $_POST);

        // * Enlève les balises HTML et PHP des STRING
        $first_name = strip_tags($_POST["first_name"]);
        $last_name = strip_tags($_POST["last_name"]);

        // * Check si connexion réussie
        require_once "connect.php";

        // * Requête SQL pour ajouter des données (finir le commentaire)
        $sql = "INSERT INTO interns (first_name, last_name) VALUES (:first_name, :last_name);";

        // * préparation de la base de données SQL
        $query = $db->prepare($sql);

        // * Rattacher les valeurs de bindValue first_name à la requête SQL
        $query->bindValue(":first_name", $first_name, PDO::PARAM_STR);

        // * Rattacher les valeurs de bindValue last_name à la requête SQL
        $query->bindValue(":last_name", $last_name, PDO::PARAM_STR);

        // * Exécution de la requête SQL
        $query->execute();

        // * récupération des données de la requête sql
        // $interns = $query->fetchAll(PDO::FETCH_ASSOC);

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
    <link rel="stylesheet" href="css/style.css">

    <title>Gamers - Add_php_crud</title>
</head>

<body id="content">
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
    <img width="30%" src="img/w6a6775zvp661.gif" alt="gif d'un papillon noir et blanc" />

    <section class="" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
        <h1>Ajouter un utilisateur</h1>
        <p>Remplissez le formulaire ci-dessous pour ajouter un nouvel utilisateur.</p>
        <p style="border: 1px solid black; width: fit-content; background-color: green; color: white"><b>Ajouter un
                utilisateur</b></p>

        <!-- post envoie en masquer un formulaire -->
        <form method="post">
            <label for="first_name">Prénom</label>
            <input type="text" Name="first_name" id="first_name" required> <br> <br>
            <label for="last_name">Nom</label>
            <input type="text" Name="last_name" id="last_name" required> <br> <br>
            <input type="submit" value="Ajouter"> <br> <br>
        </form>
        <br><br>

        <p>Pour ajouter un nouveau jeu cliquez ci-dessous.</p>

        <a href="./add_jeux.php"><button>Ajouter un jeu</button></a>
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