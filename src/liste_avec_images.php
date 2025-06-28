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
    <link rel="stylesheet" href="css/modifier_jeux.css">


    <style>
        .jeu-card {
            font-weight: 900;
            font-size: 15pt;
            color: white;
            border: 1px solid #28ff02;
            border-radius: 8px;
            padding: 1rem;
            margin: 1rem;
            width: 300px;
        }

        .jeu-card img {
            width: 100px;
            height: auto;
            border-radius: 4px;
        }

        .jeux-list {
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }

        body {
            color: white;

        }
    </style>
</head>

<body class="content">
    <h1>Liste des Jeux Vidéo</h1>

    <a href="/">Back to home</a> <br>

    <section class="jeux-list">
        <?php foreach ($jeux as $jeu): ?>
            <div class="jeu-card">
                <h2><?= htmlspecialchars($jeu['jeu']) ?></h2>
                <p><strong>Genre:</strong> <?= htmlspecialchars($jeu['genre']) ?></p>
                <p><strong>Année:</strong> <?= htmlspecialchars($jeu['annee']) ?></p>
                <p><strong>ID Éditeur:</strong> <?= htmlspecialchars($jeu['editeur_id']) ?></p>

                <?php if (!empty($jeu['image_path'])): ?>
                    <p><img src="<?= htmlspecialchars($jeu['image_path']) ?>"
                            alt="Image de <?= htmlspecialchars($jeu['jeu']) ?>">
                    </p>
                <?php endif; ?>

                <?php if (!empty($jeu['image_path_url'])): ?>
                    <p><a href="<?= htmlspecialchars($jeu['image_path_url']) ?>" target="_blank">Voir image en ligne</a></p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </section>


    <!-- * home section -->
    <section class="home">
        <!-- home / h1 / id home / img -->
        <h1 id="home">Gamers</h1>
    </section>

    <!-- * animation plane -->

    <style type="text/css">
        .home,
        #home {
            background: url(images/.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            overflow: hidden;
        }

        .sky {
            position: absolute;
            top: 10%;
            right: 2px;
            animation: sky 30s linear 0s infinite reverse;
            z-index: 99;
        }

        .sky img {
            width: 100px;
        }

        /* trajectoire de l'oiseau */
        @keyframes sky {
            from {
                top: 50px;
                right: -10px;
            }

            to {
                top: 50px;
                right: 100%;
            }
        }
    </style>

    <!-- * fond d'écran -->

    <div class="sky">
        <img src="img/tHi.gif" alt="Image d'un oiseau qui vole">
        <img id="thirdBird" src="img/tHi.gif" alt="Image troisième oiseau qui vole">
        <img id="secondBird" src="img/tHi.gif" alt="Image secondZ oiseau qui vole">
    </div>


    <!-- Droits Section : Informations sur les droits réservés et le créateur -->

    <div class="droits">
        <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_jeux_Vidéos | <a
                href=https://www.onlineformapro.com/ target=_blank> @onlineformapro</a></h6>
    </div>

    <!-- back-to-top section -------------->
    <!-- Back to top button -->
    <a id="button"></a>

    <script src="script/back-to-top.js"></script>
</body>


</html>