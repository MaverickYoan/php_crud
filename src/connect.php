<?php
const SERVER_NAME = "db";
const DB_NAME = 'project_crud';
const USERNAME = "test";
const PASSWORD = "test";
const PORT = "5432";
// const SERVER_NAME = "localhost"; // Utilisez "db" si vous utilisez Docker avec un service nommé "db"
// const DB_NAME = "project_crud"; // Nom de la base de données
// const USERNAME = "test"; // Nom d'utilisateur de la base de données
// const PASSWORD = "test"; // Mot de passe de l'utilisateur de la base de données
// const PORT = "5432"; // Port par défaut pour PostgreSQL

try {
    //code pour connexion réussie...
    $db = new PDO("pgsql:host=" . SERVER_NAME . ";port=" . PORT . ";dbname=" . DB_NAME . ";", USERNAME, PASSWORD);
    echo "connexion réussie";
    // Configure PDO pour lancer des exceptions en cas d'erreur
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //code pour connexion nok...
    //throw $th;
    echo "échec de connexion : " . $e->getMessage() . "<br>";
}

# require 'db:.php';
$data = json_decode(file_get_contents("php://input"), true);
// $email = $data['email'];
// $password = $data['password'];
$stmt = $db->prepare("SELECT id, password FROM users WHERE email = ?");
// $stmt->execute([$email]);
$user = $stmt->fetch();
// if ($user && password_verify($password, $user['password'])) {
//     session_start();
//     $_SESSION['user_id'] = $user['id'];
//     echo json_encode(['success' => true]);
// } else {
//     echo json_encode(['success' => false, 'error' => 'Identifiants invalides']);
// }