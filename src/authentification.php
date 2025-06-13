<?php
// Démarre la session
session_start();

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les valeurs du formulaire
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Ici, remplacer par la logique de vérification réel (BDD, fichier, etc.)
    $utilisateur_valide = 'test';
    $motdepasse_valide = 'test';

    if ($username === $utilisateur_valide && $password === $motdepasse_valide) {
        $_SESSION['username'] = $username;
        header('Location: espace_prive.php');
        exit();
    } else {
        $erreur = "Identifiant ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Gamers - Authentification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .form-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 6px 0 12px;
            border: 1px solid #bbb;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: rgb(4, 121, 28);
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .error {
            color: orange;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Connexion</h2>
        <?php if (!empty($erreur)) echo '<div class="error">' . htmlspecialchars($erreur) . '</div>'; ?>
        <form method="post" action="">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Se connecter">
        </form>
    </div>
</body>

</html>