<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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

    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';
    if (!preg_match($pattern, $password)) $errors[] = "Password duhet të ketë min 8 karaktere, shkronjë të madhe, të vogël, numër dhe simbol.";

    if($password !== $confirm) $errors[] = "Passwords do not match.";

    $userObj = new User($pdo);

    if($userObj->exists($email)) $errors[] = "Email already registered.";

    if (!empty($errors)) {
        $message = implode("<br>", $errors);
    } else {
        $userObj->register($fullname, $email, $password);
        header("Location: ../LogIn/login.php");
        exit();
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
</head>
<body>
<nav>
    <a href="../HomePage/index.php">Home</a>
    <a href="../LogIn/login.php">Login</a>
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
</body>
</html>
