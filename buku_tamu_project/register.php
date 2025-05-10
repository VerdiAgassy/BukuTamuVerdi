<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class='container'>
    <h2>Register Akun Baru</h2>
    <?php if (isset($_SESSION['error'])) {
        echo "<p style='color:red;'>".$_SESSION['error']."</p>";
        unset($_SESSION['error']);
    } ?>
    <form id="registerForm">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="index.php">Login disini</a></p>
</div>
<script src="ajax.js"></script>
</body>
</html>