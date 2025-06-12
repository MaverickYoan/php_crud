<?php
require_once "connect.php";

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
    <link rel="icon" href="src/img/favicon.ico" type="image/x-svg">
    <script type="text/javascript" src="script/script.js"></script>
    <link rel="stylesheet" href="css/styles.css">
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
                <li><a class="links" href="http://localhost:8000/modifier.php">Modifier Jeux</a></li>
                <li><a class="links" href="http://localhost:8000/supprimer.php">Supprimer Jeux</a></li>
                <li><a class="links" href="http://localhost:8000/contact.php">Contact</a></li>
                <li><a class="links" href="http://localhost:8000/index.php">Index</a></li>
                <li><a href="/">Back to menu</a></li>
            </ul>
        </nav>
    </header>

    <h1 style="border:1px solid black; background-color: black; color: white; width:fit-content">home</h1>
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
    <!-- Formulaire Section : Formulaire de contact -->

    <section class=article-form id="contactez-nous">
        <form action=index.html method=post>
            <b class=form-titre>Formulaire de contact</b>
            <p class=form-sous-titre>
                Remplissez le formulaire ci-dessous<br>pour nous contacter
            </p>
            <br>
            <aside class=contact-image>
                <img src="illustration_formulaire.jpg" alt="Image de contact" class=contact-img>
            </aside>
            <div class=form>
                <label for=nom>Nom :</label><br>
                <input id=nom name=nom><br>
                <label for=prenom>Prénom :</label><br>
                <input id=prenom name=prenom><br>
                <label for=email>Email :</label><br>
                <input id=email name=email><br>
                <label for=message>Message :</label><br>
                <textarea id=message name=message></textarea><br>
                <input type=submit value=Envoyer><br><br>
            </div>
        </form>

    </section>

    <!-- Footer Section : Informations supplémentaires, liens et téléchargements -->
    <footer class=footer>
        <div class=logo>
            <a>
                <img src=logo_jadoo_2bis.svg alt="titre jadoo" class=logo2bis href=https://jadoo.store/#>
            </a>
            <img src=logo_jadoo_1bis.svg alt="icone sushi jadoo" class=logo1bis>
            <br>
            <div class=gastro>
                <p>
                    <span>
                        Un voyage gastronomique entre<br>le Japon et la France
                    </span>
                </p>
            </div>
        </div>
        <!-- Tableau de liens utiles -->
        <div class=table>
            <table>
                <tr>
                    <th>
                        <b class=Restaurant>Restaurant</b>
                    <th>
                        <b class=table-titre>Contact</b>
                <tr>
                    <td class=ligne>
                        <a href=https://jadoo.store/# target=_blank style=text-decoration:none;color:var(--txtcolor)>
                            <span><br>Les nouveautés</span>
                        </a>
                    <td class=ligne>
                        <a href=https://jadoo.store/# target=_blank style=text-decoration:none;color:var(--txtcolor)>
                            <span><br>Prendre RDV</span>
                        </a>
                <tr>
                    <td class=ligne>
                        <a href=https://jadoo.store/# target=_blank style=text-decoration:none;color:var(--txtcolor)>
                            <span><br>Découvrir</span>
                        </a>
                <tr>
                    <td class=ligne>
                        <a href=https://jadoo.store/# target=_blank style=text-decoration:none;color:var(--txtcolor)>
                            <br>Commander
                        </a>
            </table>
            <br>
        </div>
        <div>
            <a class=uber>
                <img src=logo_uberEats_2.svg alt=UberEats width=200px>
                <img target=_blank>
            </a>
            <br>
            <p>
                <span class=uber>Téléchargez UberEats</span>
            </p>
            <br>
            <a href="https://rides.sng.link/Bw5zn/vz1k?_dl=uber%3A%2F%2F&pcn=eats-footer&mvid=b3ce8ed1-1fe4-45cd-bedf-aa0be64d70bf&uclick_id=0b3c7172-60e1-4067-a62d-d71c6aaa5fe6"
                target=_blank class=uber-download>
                <img src="https://d1a3f4spazzrp4.cloudfront.net/uber-com/1.3.8/d1a3f4spazzrp4.cloudfront.net/illustrations/app-store-google-4d63c31a3e.svg"
                    class=google width=50%>
            </a>
            <a href="https://rides.sng.link/Cw5zn/564k?_dl=uber%3A%2F%2F&_smtype=3&pcn=eats-footer&mvid=b3ce8ed1-1fe4-45cd-bedf-aa0be64d70bf&uclick_id=0b3c7172-60e1-4067-a62d-d71c6aaa5fe6"
                target=_blank class=uber-download>
                <img src="https://d1a3f4spazzrp4.cloudfront.net/uber-com/1.3.8/d1a3f4spazzrp4.cloudfront.net/illustrations/app-store-apple-f1f919205b.svg"
                    class=apple width=50%>
            </a>
        </div>

    </footer>

    <!-- Droits Section : Informations sur les droits réservés et le créateur -->

    <div class="droits">
        <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_jeux_Vidéos | <a
                href=https://www.onlineformapro.com/ target=_blank> @onlineformapro</a></h6>
    </div>
    <!-- // * FOOTER -->
    <footer>

    </footer>

</body>

</html>