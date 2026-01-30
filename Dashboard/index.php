<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['logged_in'])) {
    header("Location: ../Auth/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/chat.css">
    <link rel="stylesheet" href="../CSS/footer.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <!-- JS -->
    <script src="../JS/chat.js" defer></script>
</head>
<body>

<h1>Miresevini, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h1>
<a href="../Auth/logout.php">Logout</a>

<div class="dashboard">

    <!-- NAVBAR -->
    <div class="navbar">
        <img src="../images/recycle.png" alt="Logo" class="logo">
        <div>
            <span class="icons">dashboard</span>
            <span class="icons">bookmark</span>
            <span class="icons">upload</span>
            <span class="icons">favorite</span>
            <span class="icons">settings</span>
            <a href="news.php"><span class="icons">news</span></a>
            <a href="../Auth/logout.php"><span class="icons">logout</span></a>
        </div>
    </div>

    <!-- MAIN SECTION -->
    <section class="main">
        <div class="search">
            <form class="action">
                <input type="text" name="search" id="search" placeholder="Search here">
                <span class="icons">search</span>
            </form>
            <div class="notifications">
                <span class="icons">notifications</span>
            </div>
        </div>

        <div class="title">
            <h1>Pajisjet</h1>
            <form>
                <label for="Pajisjet">Sort by</label>
                <select name="Pajisjet" id="Pajisjet">
                    <option>Pajisje kompjuterike</option>
                    <option>Pajisje mobile - Apple</option>
                    <option>Pajisje mobile - Android</option>
                </select>
            </form>
        </div>

        <div class="device-list">
            <div class="device">
                <h2>Hard Disk</h2>
                <p>Hard disk per Lenovo 2020</p>
                <ul class="aktive">
                    <li>E disponueshme</li>
                    <li>Transport i siguruar</li>
                </ul>
                <span class="icons">chat</span>
            </div>

            <div class="device">
                <h2>iPhone Battery</h2>
                <p>iPhone 14 Battery</p>
                <ul class="aktive">
                    <li>E disponueshme</li>
                    <li>Transport i pasiguruar</li>
                </ul>
                <span class="icons">chat</span>
            </div>

            <div class="device">
                <h2>RAM 8GB</h2>
                <p>DDR4 RAM</p>
                <ul class="aktive">
                    <li>E disponueshme</li>
                    <li>Transport i siguruar</li>
                </ul>
                <span class="icons">chat</span>
            </div>
        </div>
    </section>

    <!-- SECONDARY SECTION -->
    <section class="secondary">
        <div class="purchase">
            <h2>My purchases</h2>

            <div class="purchase-item">
                <span>Hard Disk</span>
                <small>Done</small>
            </div>

            <div class="purchase-item">
                <span>iPhone Battery</span>
                <small>Pending</small>
            </div>

            <div class="purchase-item">
                <span>RAM 8GB</span>
                <small>Done</small>
            </div>
        </div>
    </section>
</div>

<!-- CHATBOX -->
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

<!-- FOOTER -->
<footer>
    <div class="footer-links">
        <a href="about.html">About Us</a>
        <a href="support.html">Support</a>
        <a href="contact.html">Contact Us</a>
    </div>
    <div class="footer-copy">
        &copy; 2025 Your Company. All rights reserved.
    </div>
</footer>

</body>
</html>
