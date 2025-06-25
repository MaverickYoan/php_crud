<?php
require_once "connect.php";

// Requête SQL
$sql = "SELECT * FROM jeux";
$query = $db->prepare($sql);
$query->execute();
$jeux = $query->fetchAll(PDO::FETCH_ASSOC);

require "disconnect.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Jeux</title>
    <link rel="stylesheet" href="css/test.css">


    <style>
        .jeu-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 1rem;
            margin: 1rem;
            width: 300px;
            display: inline-block;
            vertical-align: top;
        }

        .jeu-card img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <h1>Liste des Jeux Vidéo</h1>

    <?php foreach ($jeux as $jeu): ?>
        <div class="jeu-card">
            <h2><?= htmlspecialchars($jeu['jeu']) ?></h2>
            <p><strong>Genre:</strong> <?= htmlspecialchars($jeu['genre']) ?></p>
            <p><strong>Année:</strong> <?= htmlspecialchars($jeu['annee']) ?></p>
            <p><strong>ID Éditeur:</strong> <?= htmlspecialchars($jeu['editeur_id']) ?></p>

            <?php if (!empty($jeu['image_path'])): ?>
                <p><img src="<?= htmlspecialchars($jeu['image_path']) ?>" alt="Image de <?= htmlspecialchars($jeu['jeu']) ?>">
                </p>
            <?php endif; ?>

            <?php if (!empty($jeu['image_path_url'])): ?>
                <p><a href="<?= htmlspecialchars($jeu['image_path_url']) ?>" target="_blank">Voir image en ligne</a></p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

</body>

</html>