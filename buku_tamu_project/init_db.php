<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'buku_tamu';

try {
    $conn = new PDO("mysql:host=$host", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database
    $conn->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $conn->exec("USE $dbname");

    // Create users table
    $conn->exec("CREATE TABLE IF NOT EXISTS users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL
    )");

    // Create guestbook table
    $conn->exec("CREATE TABLE IF NOT EXISTS guestbook (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nama VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        pesan TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    echo "Database dan tabel berhasil dibuat!";
} catch(PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>