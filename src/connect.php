<?php
const SERVER_NAME = "db";
const DB_NAME = 'project_crud';
const USERNAME = "test";
const PASSWORD = "test";
const PORT = "5432";

try {
    //code...
    $db = new PDO("pgsql:host= " . SERVER_NAME . ";port=" . PORT . ";dbname=" . DB_NAME . ";", USERNAME, PASSWORD);
    echo "connexion réussie";
} catch (PDOException $e) {
    //throw $th;
    echo "échec de connexion : " . $e->getMessage() . "<br>";
}
