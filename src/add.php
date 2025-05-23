<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_php_crud</title>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <ul class="nav-links" id="navLinks">
            <li><a class="links" href="http://localhost:8000/stagiaire.php?=0">stagiaire</a></li>
            <li><a class="links" href="http://localhost:8000/index.php">index</a></li>
            <li><a class="links" href="http://localhost:8000/tablenewtest.php">tablenewtest</a></li>
            <li><a class="links" href="http://localhost:8000/add.php">Ajout User</a></li>
            <li><a class="links" href="http://localhost:8000/contact.php">Contact</a></li>
            <a href="/">Back to menu</a>
        </ul>
    </nav>

    <p style="border: 1px solid black; width: fit-content; background-color: green;">Ajouter un stagiaire</p>
    <!-- post envoie en masquer un formulaire -->
    <form method="post">
        <label for="firstName">Prénom</label>
        <input type="text" name="firstName" required>
        <label for="lastName">Nom</label>
        <input type="text" name="lastName" required>
        <button type="submit">Envoyer</button>
    </form>

</body>

</html>