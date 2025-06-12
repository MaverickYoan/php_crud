<?php
// * Envoyer message dans base de donnée messages.db avec la table messages.sql
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

    // * afficher la table messages
    print_r($messages);

    // * Fermeture de la connexion
    $db = null;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon_enlightment.ico" type="image/x-svg">
    <!-- <link rel="stylesheet" href="css/style.css"> -->

    <title>Message Envoyé</title>
</head>

<style>
body {
    font-family: Arial, sans-serif;
    text-align: center;
    margin-top: 50px;
}

h1 {
    color: #4CAF50;
}

p {
    font-size: 18px;
}

img {
    max-width: 100%;
    height: auto;
}
</style>


<body>

    <h1>Merci pour votre message !</h1>

    <p>Nous avons bien reçu votre message et nous vous répondrons dans les plus brefs délais.</p>

    <image src="img/ob_aea8c1_thanks.gif" alt="Merci" style="width: 40%; height: auto;" />

    <!-- // * FOOTER -->
    <footer>
        <div class="droits">
            <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_jeux_Vidéos | @onlineformapro</h6>
        </div>
    </footer>

</body>

<script src="script.js"></script>

</html>