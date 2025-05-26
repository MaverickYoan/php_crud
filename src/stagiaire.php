<?php
// * Est-ce que les champs de formulaire sont définis
if (
    isset($_GET["id"])      // Vérifie si la variable 'id' existe dans l'URL (ex: ?id=123)
    && !empty($_GET["id"])  // Vérifie si cette variable n'est pas vide (ex: ?id=)
) {

    // * Définitions de variables
    require_once "connect.php";
    $id = $_GET["id"];
    print_r($id);

    // * sql SELECT
    $sql = "SELECT * FROM interns WHERE id = :id";

    // * préparation de la requête sql
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // * exécution de la requête sql
    $query->execute();

    $stagiaire = $query->fetch();
    // print_r($stagiaire);

    require "disconnect.php";
}
?>

<!-- http://localhost:8000/stagiaire.php?id=3 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico" type="image/x-svg">
    <!-- TITRE -->
    <?php
    // * enlever le isset est possible, !empty evite l'option "utilisateur qui entre une id inexistante dans la BDD", isset ne l'évite pas *
    if (isset($stagiaire) && !empty($stagiaire)):
        // print_r($stagiaire);
    ?>
        <title>Page de <?= $stagiaire['first_name'] ?></title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <ul class="nav-links" id="navLinks">
            <li><a class="links" href="http://localhost:8000/stagiaire.php">stagiaire</a></li>
            <li><a class="links" href="http://localhost:8000/index.php">index</a></li>
            <li><a class="links" href="http://localhost:8000/add.php">Ajout User</a></li>
            <li><a class="links" href="http://localhost:8000/modifier.php">Modifier User</a></li>
            <a href="/">Back to menu</a>
        </ul>
    </nav>

    <hr />
    <img width="10%" src="img/w6a6775zvp661.gif" alt="gif d'ajout d'utilisateur">
    <br>
    <h1 style="border:1px solid black; background-color: black; color: white; width:fit-content">Page de l'utilisateur</h1>
    <h1 style="border:1px solid black; width:fit-content"><?= $stagiaire['first_name'] ?></h1>
    <h1 style="border:1px solid black; width:fit-content"><?= $stagiaire['last_name'] ?></h1>
    <!-- <p>Prénom : Yo</p>
    <p>Nom : YDM</p> -->

<?php
    else:
?>

    <p>user nok</p>
    <a href="/">Back to menu</a>

<?php
    endif;
?>

</body>

<!-- // * FOOTER -->
<footer>
    <div class="droits">
        <h6 style="display: flex; justify-content:center;">&copy; 2025 Projet_crud | @onlineformapro | Mentions légales</h6>
    </div>
</footer>

</html>