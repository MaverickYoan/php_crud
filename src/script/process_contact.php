<?php
// * Envoyer message dans base de donnée messages.db avec la table messages.sql
// * Vérification de l'envoi du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // * Connexion à la base de données
        $db = new PDO('pgsql:host=localhost;dbname=messages', 'your_username', 'your_password');
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
        $query = $db->query("SELECT * FROM messages");
        $messages = $query->fetchAll(PDO::FETCH_ASSOC);
        print_r($messages);

    } catch(PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    } finally {
        // * Fermeture de la connexion
        $db = null;
    }
}
?>

<!-- Rest of your HTML code remains unchanged -->