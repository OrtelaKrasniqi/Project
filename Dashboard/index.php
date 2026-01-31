<?php
require_once "../Authentication.php";
require_once "../db.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!Authentication::isLoggedIn()) {
    header("Location: ../login.php");
    exit;
}

$stmt = $pdo->query("SELECT id, name FROM categories ORDER BY name ASC");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="chat.css">
    <script src="chat.js" defer></script>
    <link rel="stylesheet" href="footer.css">
</head>

<body>

<div class="dashboard">
    <div class="navbar">
        <img src="recycle.png" alt="" class="logo">
        <div>
            <span class="icons">dashboard</span>
            <span class="icons">bookmark</span>
            <span class="icons">upload</span>
            <span class="icons">favorite</span>
            <span class="icons">settings</span>
            <a href="../news/news.php"><span class="icons">news</span></a>
            <a href="../logout.php"><span class="icons">logout</span></a>
        </div>
    </div>

    <section class="main">
        <div class="search">
            <form class="action" onsubmit="return false;">
                <input type="text" name="search" id="search" placeholder="search here">
                <span class="icons">search</span>
            </form>

            <div class="notifications">
                <span class="icons">notifications</span>
            </div>
        </div>

        <form action="#" onsubmit="return false;">
            <label for="Pajisjet">Sort by</label>
            <select name="Pajisjet" id="Pajisjet">
                <option value="">All</option>

                <?php foreach($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>">
                        <?= htmlspecialchars($cat['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>

        <div class="device-list">
            <div class="device">
                <div class="category"></div>
                <h2>Hard Disk</h2>
                <p>hard disk per lenovo 2020</p>
                <ul class="aktive">
                    <li>E disponueshme</li>
                    <li>Trasnport i siguruar</li>
                </ul>
                <img src="" alt="">
                <span class="icons">chat</span>
            </div>

            <div class="device">
                <div class="category"></div>
                <h2>Iphone Battery</h2>
                <p>Iphone 14 Battery</p>
                <ul class="aktive">
                    <li>E disponueshme</li>
                    <li>Trasnport i pasiguruar</li>
                </ul>
                <img src="" alt="">
                <span class="icons">chat</span>
            </div>

            <div class="device">
                <div class="category"></div>
                <h2>Iphone Battery</h2>
                <p>Iphone 14 Battery</p>
                <ul class="aktive">
                    <li>E disponueshme</li>
                    <li>Trasnport i pasiguruar</li>
                </ul>
                <img src="" alt="">
                <span class="icons">chat</span>
            </div>

            <div class="device">
                <div class="category"></div>
                <h2>Iphone Battery</h2>
                <p>Iphone 14 Battery</p>
                <ul class="aktive">
                    <li>E disponueshme</li>
                    <li>Trasnport i pasiguruar</li>
                </ul>
                <img src="" alt="">
                <span class="icons">chat</span>
            </div>

            <div class="device">
                <div class="category"></div>
                <h2>Iphone Battery</h2>
                <p>Iphone 14 Battery</p>
                <ul class="aktive">
                    <li>E disponueshme</li>
                    <li>Trasnport i pasiguruar</li>
                </ul>
                <img src="" alt="">
                <span class="icons">chat</span>
            </div>

            <div class="device">
                <div class="category"></div>
                <h2>Iphone Battery</h2>
                <p>Iphone 14 Battery</p>
                <ul class="aktive">
                    <li>E disponueshme</li>
                    <li>Trasnport i pasiguruar</li>
                </ul>
                <img src="" alt="">
                <span class="icons">chat</span>
            </div>
        </div>
    </section>

    <section class="secondary">
        <div class="purchase">
            <h2 class="side-title">My purchases</h2>

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
