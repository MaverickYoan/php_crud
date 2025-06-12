// todo Envoyer message dans base de donnée messages.db avec la table messages_contact.sql
<?php
// * Envoyer message dans base de donnée messages.db avec la table messages_contact.sql
// * Vérification de l'envoi du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // * Connexion à la base de données
    $db = new PDO('pgsql:messages.db');
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
    // * Fermeture de la connexion
    $db = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contact.css">
    <title>Page de contact</title>
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
        <ul style="font-size: 0.8rem;" class="nav-links" id="navLinks">
            <!-- <li><a class="links" href="http://localhost:8000/stagiaire.php">stagiaire</a></li> -->
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
    <main>
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


    <!-- // * FOOTER -->
    <footer>
        <div class="droits">
            <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_jeux_Vidéos | @onlineformapro</h6>
        </div>
    </footer>
</body>

</html>