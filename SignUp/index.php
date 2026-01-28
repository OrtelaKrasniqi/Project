<?php
session_start();

class User {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function exists($email) {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->rowCount() > 0;
    }

    public function register($fullname, $email, $password, $role = 'user') {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (fullname, email, password, role, created_at) VALUES (:fullname, :email, :password, :role, NOW())");
        return $stmt->execute([
            'fullname' => $fullname,
            'email' => $email,
            'password' => $hashedPassword,
            'role' => $role
        ]);
    }
}

$message = "";

$host = "localhost";
$dbname = "college_project"; 
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = trim($_POST["fullname"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirm = $_POST["confirm-password"] ?? "";

    $errors = [];

    if(strlen($fullname) < 3) $errors[] = "Full name must be at least 3 characters.";
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email address.";
    if(strlen($password) < 6) $errors[] = "Password must be at least 6 characters.";
    if($password !== $confirm) $errors[] = "Passwords do not match.";

    $userObj = new User($pdo);

    if($userObj->exists($email)) $errors[] = "Email is already registered.";

    if(empty($errors)) {
        $userObj->register($fullname, $email, $password);
        $message = "✅ Account created successfully!";
    } else {
        $message = implode("<br>", $errors);
    }
}
?>


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
