<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

// Ambil data dari database
try {
    $stmt = $conn->query("SELECT * FROM guestbook ORDER BY created_at DESC");
    $entries = $stmt->fetchAll();
} catch(PDOException $e) {
    $entries = [];
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header("Location: buku_tamu.php"); // Redirect ke halaman ini setelah logout
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
<title>Buku Tamu</title>
</head>
<body>
<div class='container'>
<h2>Form Buku Tamu</h2>
    <form id="guestForm">  <!-- Tambahkan ID dan hapus action -->
        Nama: <input type="text" name="nama" required><br>
        Email: <input type="email" name="email" required><br>
        Pesan: <textarea name="pesan" required></textarea><br>
        <button type="submit">Kirim</button>
    </form>

<h3>Daftar Buku Tamu:</h3>
<div class="daftar-buku-tamu">
<?php if (!empty($entries)): ?>
    <?php foreach ($entries as $entry): ?>
        <div class='entry'>
            <p><strong>Nama:</strong> <?= htmlspecialchars($entry['nama']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($entry['email']) ?></p>
            <p><strong>Pesan:</strong><br><?= nl2br(htmlspecialchars($entry['pesan'])) ?></p>
            <small><?= $entry['created_at'] ?></small>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Belum ada data buku tamu.</p>
<?php endif; ?>
<script src="ajax.js"></script>
</div>
<div class="logout-container">
        <a href="?action=logout" class="logout-btn">Logout</a>
</div>
</body>
</html>