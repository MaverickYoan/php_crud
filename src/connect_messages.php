<?php
const SERVER_NAME = "db";
// Change 'messages' to the name of an existing database, or create the 'messages' database in PostgreSQL
const DB_NAME = 'postgres'; // or your actual database name
const USERNAME = "test";
const PASSWORD = "test";
const PORT = "5432";

try {
    //code pour connexion réussie...
    $db = new PDO("pgsql:host=" . SERVER_NAME . ";port=" . PORT . ";dbname=" . DB_NAME . ";", USERNAME, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // echo "connexion réussie";
} catch (PDOException $e) {
    //code pour connexion nok...
    throw new Exception("Échec de la connexion à la base de données : " . $e->getMessage());
    echo "échec de connexion : " . $e->getMessage() . "<br>";
}

// require 'db.php';
// $data = json_decode(file_get_contents("php://input"), true);
// $email = $data['email'];
// $password = $data['password'];
// $stmt = $db->prepare("SELECT id, password FROM users WHERE email = ?");
// $stmt->execute([$email]);
// $user = $stmt->fetch();
// if ($user && password_verify($password, $user['password'])) {
// session_start();
// $_SESSION['user_id'] = $user['id'];
// echo json_encode(['success' => true]);
// } else {
//     echo json_encode(['success' => false, 'error' => 'Identifiants invalides']);
// }