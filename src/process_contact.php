<?php

// * Envoyer message dans base de donnée messages.db avec la table messages.sql
// * Vérification de l'envoi du formulaire

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // * Connexion à la base de données
        $db = new PDO('pgsql:host=localhost;dbname=messages', 'test', 'test'); // Remplacez 'username' et 'password' par vos identifiants
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
            // echo "<p>Message envoyé avec succès !</p>";
        } else {
            // echo "<p>Erreur lors de l'envoi du message.</p>";
        }

        //todo PENSER A MODIFIER AFIN QUE CELA SE CONNECT BIEN A LA BDD messages dans PgAdmin

        // * afficher la table messages
        $query = $db->query("SELECT * FROM messages");
        $db = $query->fetchAll(PDO::FETCH_ASSOC);
        // print_r($messages);

    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
        // echo "Erreur de connexion : " . $e->getMessage();
    } finally {
        // * Fermeture de la connexion
        $messages = null;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<style>
    img {
        max-width: 100%;
        height: auto;
        border-radius: 20px;
    }
</style>


<image src="img/ob_aea8c1_thanks.gif" alt="Merci" style="width: 40%; height: auto;" />

<header>
    <h1>Message envoyé</h1>
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
        <li><a class="links" href="http://localhost:8000/modifier_jeux.php">Modifier Jeux</a></li>
        <li><a class="links" href="http://localhost:8000/supprimer.php">Supprimer Jeux</a></li>
        <li><a class="links" href="http://localhost:8000/contact.php">Contact</a></li>
        <li><a class="links" href="http://localhost:8000/index.php">Index</a></li>
        <li><a href="/">Back to index</a></li>
    </ul>
</nav>

</main>
<script>
    document.getElementById("hamburgerMenu").addEventListener("click", function() {
        var navLinks = document.getElementById("navLinks");
        if (navLinks.style.display === "block") {
            navLinks.style.display = "none";
        } else {
            navLinks.style.display = "block";
        }
    });
</script>

<!-- // * FOOTER -->
<footer>
    <div class="droits">
        <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_jeux_Vidéos | @onlineformapro</h6>
    </div>
</footer>
</body>

</html>