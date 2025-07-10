<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>MelonAssist | Főoldal</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php if (isset($_SESSION['user_id'])): ?>
        <header>
            <h1>Üdv, <?= htmlspecialchars($_SESSION['username']) ?>! 🍉</h1>
            <a href="logout.php">Kijelentkezés</a>
        </header>

        <!-- Twitch Stream -->
        <div class="twitch-container">
            <iframe src="https://player.twitch.tv/?channel=melonassist&parent=localhost" 
                    frameborder="0" allowfullscreen>
            </iframe>
        </div>

        <!-- Chat -->
        <iframe src="chat.php" class="chat-iframe"></iframe>

    <?php else: ?>
        <div class="login-prompt">
            <h2>Jelentkezz be a chathez!</h2>
            <a href="login.php" class="btn">Bejelentkezés</a>
        </div>
    <?php endif; ?>
</body>
</html>
