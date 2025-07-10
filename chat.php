<?php
include 'includes/config.php';
checkAuth();

// Üzenet küldése
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = htmlspecialchars($_POST['message']);
    $stmt = $conn->prepare("INSERT INTO chat_messages (user_id, message) VALUES (?, ?)");
    $stmt->execute([$_SESSION['user_id'], $message]);
}

// Üzenetek lekérése
$stmt = $conn->prepare("
    SELECT m.*, u.username 
    FROM chat_messages m
    JOIN users u ON m.user_id = u.id
    ORDER BY m.timestamp DESC
    LIMIT 50
");
$stmt->execute();
$messages = $stmt->fetchAll();
?>

<div class="chat-box">
    <?php foreach ($messages as $msg): ?>
        <div class="message">
            <strong><?= htmlspecialchars($msg['username']) ?>:</strong>
            <p><?= htmlspecialchars($msg['message']) ?></p>
        </div>
    <?php endforeach; ?>

    <form method="POST">
        <input type="text" name="message" placeholder="Írj üzenetet..." required>
        <button type="submit">Küldés</button>
    </form>
</div>
