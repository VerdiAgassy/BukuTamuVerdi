<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Login Buku Tamu</title>
</head>
<body>
<div class='container'>
    <h2>Login Buku Tamu</h2>
    <?php if (isset($_SESSION['error'])) { ?>
        <p style='color:red;'><?= $_SESSION['error'] ?></p>
    <?php unset($_SESSION['error']); } ?>
    
    <form id="loginForm" method="post"> 
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit" name="login">Login</button>
    </form>
    
    <p>Belum punya akun? <a href="register.php">Daftar disini</a></p>
    
    
    <script src="ajax.js"></script>
</div>
</body>
</html>