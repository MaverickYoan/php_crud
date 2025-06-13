<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    header('Location: authentification.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Espace Privé</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 600px;
        margin: 80px auto;
        padding: 30px;
        border: 1px solid #ddd;
        border-radius: 8px;
        text-align: center;
    }

    a {
        color: #0078d7;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Bienvenue dans l'espace privé</h1>
        <p>Bonjour, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong> !</p>
        <p>Vous êtes maintenant connecté à l'espace privé.</p>
        <p><a href="deconnexion.php">Se déconnecter</a></p>
    </div>
</body>

</html>