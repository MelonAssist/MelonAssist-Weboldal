<?php
include '../includes/config.php';
if ($_SESSION['role'] !== 'admin') die("Hozzáférés megtagadva!");

// Chat üzenet törlése
if (isset($_GET['delete'])) {
    $conn->query("DELETE FROM chat_messages WHERE id = " . intval($_GET['delete']));
}

// Felhasználó bannolása
if (isset($_GET['ban'])) {
    $conn->query("UPDATE chat_messages SET is_banned = 1 WHERE user_id = " . intval($_GET['ban']));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <h1>Admin Irányítópult 🍉</h1>
    
    <!-- Chat moderálás -->
    <div class="chat-logs">
        <?php
        $messages = $conn->query("
            SELECT m.*, u.username 
            FROM chat_messages m
            JOIN users u ON m.user_id = u.id
            ORDER BY m.timestamp DESC
        ");
        while ($msg = $messages->fetch()):
        ?>
            <div class="message <?= $msg['is_banned'] ? 'banned' : '' ?>">
                <strong><?= htmlspecialchars($msg['username']) ?>:</strong>
                <p><?= htmlspecialchars($msg['message']) ?></p>
                <a href="?delete=<?= $msg['id'] ?>">❌ Törlés</a>
                <a href="?ban=<?= $msg['user_id'] ?>">🔨 Ban</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
