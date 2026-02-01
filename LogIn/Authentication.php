<?php

class Authentication
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->pdo = $pdo;
    }

    public function login(string $email, string $password, bool $remember = false): bool
    {
        $sql = "SELECT id, name, email, password, role
                FROM users
                WHERE email = :email
                LIMIT 1";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user['password'])) {
            return false;
        }

        $_SESSION['logged_in'] = true;
        $_SESSION['user_id']   = $user['id'];
        $_SESSION['name']      = $user['name'];
        $_SESSION['email']     = $user['email'];
        $_SESSION['role']      = $user['role'];

       
        if ($remember) {
            setcookie("remember_email", $user['email'], [
                "expires"  => time() + (7 * 24 * 60 * 60), 
                "path"     => "/",
                "secure"   => false,  
                "httponly" => true,
                "samesite" => "Lax"
            ]);
        } else {
            self::deleteRememberCookie();
        }

        return true;
    }

    public static function isLoggedIn(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    public static function logout(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();

      
        self::deleteRememberCookie();
    }

    public static function user(): ?array
    {
        if (!self::isLoggedIn()) {
            return null;
        }

        return [
            'id'    => $_SESSION['user_id'],
            'name'  => $_SESSION['name'],
            'email' => $_SESSION['email'],
            'role'  => $_SESSION['role'],
        ];
    }

    public static function rememberEmail(): string
    {
        return $_COOKIE["remember_email"] ?? "";
    }

    private static function deleteRememberCookie(): void
    {
        setcookie("remember_email", "", [
            "expires" => time() - 3600,
            "path"    => "/"
        ]);

        unset($_COOKIE["remember_email"]);
    }
}
