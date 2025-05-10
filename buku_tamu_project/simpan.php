<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['login'])) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $nama = htmlspecialchars($_POST['nama']);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $pesan = htmlspecialchars($_POST['pesan']);

        // Validasi data
        if(empty($nama) || !$email || empty($pesan)) {
            throw new Exception("Data tidak valid!");
        }

        $stmt = $conn->prepare("INSERT INTO guestbook (nama, email, pesan) VALUES (?, ?, ?)");
        $stmt->execute([$nama, $email, $pesan]);
        
        echo json_encode(['status' => 'success']);
    } catch(Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
    exit;
}
?>