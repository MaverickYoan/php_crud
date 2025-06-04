<?php
// src/db.php
// Configuration de la connexion
$host = 'localhost';
$db = 'project_crud';
$user = 'test';
$pass = '';
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
$pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
 exit('Erreur connexion : ' . $e->getMessage());
}