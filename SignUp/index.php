
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="chat.css">
    <script src="chat.js" defer></script>
</head>
<body>
    <nav>
        <a href="../HomePage/index.html">Home</a>
        <a href="../LogIn/login.html">Login</a>
        <a href="../SignUp/index.php">Sign Up</a>
    </nav>
    <main>
        <div class="signup-container">
            <h2>Create Account</h2>
            <?php if(!empty($message)): ?>
                <p style="color:red; font-weight:bold;"><?php echo $message; ?></p>
            <?php endif; ?>
            <form method="post">
                <input type="text" name="fullname" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm-password" placeholder="Confirm Password" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </main>
    <div id="chatbox-container">
        <button id="chat-toggle-btn">💬</button>
        <div id="chatbox-panel">
            <div id="chatbox-header">
                <h4>Chat</h4>
                <button id="chat-close-btn">×</button>
            </div>
            <div id="chatbox-messages">
                <p>Welcome! How can I help you?</p>
            </div>
            <div id="chatbox-input">
                <input type="text" placeholder="Type a message...">
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>
</body>
</html>
