<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username === 'admin' && $password === 'melon123') {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
    } else {
        $error = "Hibás adatok!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Bejelentkezés</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <form method="POST">
        <input type="text" name="username" placeholder="Felhasználónév" required>
        <input type="password" name="password" placeholder="Jelszó" required>
        <button type="submit">Belépés</button>
        <?php if (isset($error)) echo "<p>$error</p>"; ?>
    </form>
</body>
</html>
