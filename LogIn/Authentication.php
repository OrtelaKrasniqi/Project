<?php

class Authentication
{
    private string $username;
    private string $password;

    public function __construct(string $username, string $password)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->username = $username;
        $this->password = $password;
    }

    public function login(): bool
    {
        if ($this->username === "admin@hotmail.com" && $this->password === "Ortela123!") {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $this->username;
            return true;
        }

        return false;
    }

    public static function isLoggedIn(): bool
    {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    public static function logout(): void
    {
        session_start();
        session_destroy();
    }
}
