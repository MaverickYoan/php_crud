<!DOCTYPE html>
<html lang="fr">


<!-- * HEAD -->

<head>
    <!-- // - 2 - META -->
    <meta charset=utf-8>
    <meta content="width=device-width,initial-scale=1" name=viewport>
    <link rel="stylesheet" href="style.css">
    <title>php_crud</title><!-- TITRE -->
</head>

<!-- * BODY -->

<body id="content">
    <h1>test</h1>
    <p>créer table sql interns</p>

    <!-- NAVBAR -->
    <nav class="navbar">
        <ul class="nav-links" id="navLinks">
            <li><a class="links" href="#welcome">Home</a></li>
            <li><a class="links" href="#shop">Shop</a></li>
            <li><a class="links" href="#contact">Contact</a></li>
        </ul>
    </nav>

    <hr />



    <?php

    // Affiche toutes les informations, comme le ferait INFO_ALL
    phpinfo();

    // Affiche uniquement le module d'information.
    // phpinfo(8) fournirait les mêmes informations.
    phpinfo(INFO_MODULES);

    ?>

    <!-- back-to-top section -------------->
    <a href="#content" class="back-to-top">
        <span>Retour en haut</span>
        <!-- aria-hidden="true" opur masquer l'icon de l'écran -->
        <svg width="18" height="18" viewbox=" 0 0 24 24" aria-hidden="true">
            <path d="M5 12h14" />
            <path d="m12 5 7 7-7 7" />
        </svg>

        <!-- Script Section : Script pour activer le menu mobile -->
        <script src="script.js"></script>

</body>

</html>