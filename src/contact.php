<?php
require_once "connect_messages.php"; // Assure-toi que ce fichier définit bien $db

// * Envoyer message dans base de donnée messages.db avec la table messages.sql
// * Vérification de l'envoi du formulaire

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // * Connexion à la base de données
        $db = new PDO('pgsql:host=localhost;dbname=messages', 'username', 'password'); // Remplacez 'username' et 'password' par vos identifiants
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // * Préparation de la requête SQL
        $stmt = $db->prepare("INSERT INTO messages (objet, nom, prenom, email, message) VALUES (:objet, :nom, :prenom, :email, :message)");
        // * Liaison des paramètres
        $stmt->bindParam(':objet', $_POST['objet']);
        $stmt->bindParam(':nom', $_POST['nom']);
        $stmt->bindParam(':prenom', $_POST['prenom']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':message', $_POST['message']);
        // * Exécution de la requête
        if ($stmt->execute()) {
            echo "<p>Message envoyé avec succès !</p>";
        } else {
            echo "<p>Erreur lors de l'envoi du message.</p>";
        }

        //todo PENSER A MODIFIER AFIN QUE CELA SE CONNECT BIEN A LA BDD messages dans PgAdmin

        // * afficher la table messages
        $query = $db->query("SELECT * FROM messages");
        $messages = $query->fetchAll(PDO::FETCH_ASSOC);
        // print_r($messages);
        // print_r($messages);
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    } finally {
        // * Fermeture de la connexion
        $db = null;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon_enlightment.ico" type="image/x-svg">
    <link rel="stylesheet" href="css/test.css">
    <script type="text/javascript" src="script/script.js"></script>

    <title>Gamers - Contact</title>
</head>

<body>
    <header>
        <h1>Formulaire de contact</h1>
    </header>
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
    <main>
        <p class="textBeforeFooter">Pour toute question, suggestion ou demande d'information, n'hésitez pas à nous
            contacter via le formulaire ci-dessous.
            Nous sommes là pour vous aider !</p>

        <form action="process_contact.php" method="POST">
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>

            <button type="submit">Envoyer</button>
        </form>
    </main>

    <!-- Formulaire Section : Formulaire de contact -->
    <section class=article-form id="contactez-nous">
        <form action="process_contact.php" method="POST">
            <b class=form-titre>Formulaire de contact</b>
            <p class=form-sous-titre> Remplissez le formulaire ci-dessous<br>pour nous contacter </p>
            <br>
            <aside class=contact-image>
                <img src="illustration_formulaire.jpg" alt="Image de contact" class=contact-img>
            </aside>
            <div class=form>
                <label for=objet>Objet :</label><br>
                <input id=objet name=objet><br>
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

    <!-- Section Contact -->
    <section id="contact">
        <div class="container">
            <h2>CONTACTS & LIENS</h2>
            <div class="contact-links">
                <div class="contact-link">
                    <p>Facebook</p>
                    <a href="https://www.facebook.com/maverick.bash" target="_blank">Maverick Yo</a>
                </div>
                <div class="contact-link">
                    <p>YouTube</p>
                    <a href="http://www.youtube.com/@TeK2OuF" target="_blank">TeK2OuF</a>
                </div>
                <div class="contact-link">
                    <p>Soundcloud</p>
                    <a href="https://soundcloud.com/yoan-de-menezes/sets/tek2ouf" target="_blank">TeK2OuF_00</a>
                </div>
                <div class="contact-link">
                    <p>Soundcloud</p>
                    <a href="https://soundcloud.com/tek2ouf" target="_blank">TeK2OuF_01</a>
                </div>
                <div class="contact-link">
                    <p>Soundcloud</p>
                    <a href="https://soundcloud.com/mav-yo" target="_blank">TeK2OuF_02</a>
                </div>
                <div class="contact-link">
                    <p>Mixcloud</p>
                    <a href="https://www.mixcloud.com/yo_t2osound6tm/" target="_blank">TeK2OuF</a>
                </div>
                <div class="contact-link">
                    <p>Bandcamp</p>
                    <a href="https://bandcamp.com/tek2ouf" target="_blank">TeK2OuF</a>
                </div>
                <div class="contact-link">
                    <p>Bandcamp</p>
                    <a href="https://artistsinaction.bandcamp.com/music" target="_blank">Artists In Action</a>
                </div>
                <div class="contact-link">
                    <p>Site</p>
                    <a href="http://www.technoplus.org/t,1/1071/qui-sommes-nous-?" target="_blank">TECHNO PLUS</a>
                </div>
                <div class="contact-link">
                    <p>Site</p>
                    <a href="http://freeform.fr/qui-sommes-nous/" target="_blank">Freeform.fr</a>
                </div>
                <div class="contact-link">
                    <p>LinkedIn</p>
                    <a href="http://www.keep-smiling.com/?p=238" target="_blank">KEEP SMILING</a>
                </div>
                <div class="contact-link">
                    <p>Forum</p>
                    <a href="http://sound-system-unity.forumactif.org" target="_blank">Sound System Unity</a>
                </div>
                <div class="contact-link">
                    <p>Mail</p>
                    <p>000tek2ouf000@gmail.com</p>
                </div>
            </div>
        </div>
    </section>

    <!-- * Avant le footer -->
    <div class="beforeFooter">
        <img class="imgLogo" src="a1698447057_16.jpg" alt="">
    </div>

    <p>Sites perso</p>
    <a href="https://fabulous-platypus-fdb4a3.netlify.app" target="_blank">Wink Netlify WebbApp</a>
    <a href="https://amazing-puppy-e2c060.netlify.app/" target="_blank">TeK2ouF - Gaming Underground Netlify WebbApp</a>

    <!-- // * FOOTER -->
    <footer>
        <div class="droits">
            <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_jeux_Vidéos | @onlineformapro</h6>
        </div>
    </footer>

</body>

</html>