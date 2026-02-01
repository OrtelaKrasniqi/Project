<?php
require_once "Authentication.php";
$emailCookie = Authentication::rememberEmail();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>

    <link rel="stylesheet" href="chat.css">
    <script src="chat.js" defer></script>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<section class="center-form">
    <form id="loginForm" class="form-box" method="POST" action="process_login.php" novalidate>
        <h2>Log in</h2>

        <input type="email" id="emailInput" name="email" placeholder="Email">
        <small id="emailError" style="color:red; display:block; margin-bottom:10px;"></small>

        <input type="password" id="passwordInput" name="password" placeholder="Password">
        <small id="passwordError" style="color:red; display:block; margin-bottom:10px;"></small>

        <button type="submit" class="btn">Log in</button>
    </form>
</section>

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

<script>
const loginForm = document.getElementById("loginForm");
const emailInput = document.getElementById("emailInput");
const passwordInput = document.getElementById("passwordInput");

const emailError = document.getElementById("emailError");
const passwordError = document.getElementById("passwordError");

const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

loginForm.addEventListener("submit", function (e) {
    emailError.textContent = "";
    passwordError.textContent = "";

    let valid = true;

    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();

    if (email === "") {
        emailError.textContent = "Email është i detyrueshëm.";
        valid = false;
    } else if (!emailRegex.test(email)) {
        emailError.textContent = "Email nuk është valid.";
        valid = false;
    }

    if (password === "") {
        passwordError.textContent = "Password është i detyrueshëm.";
        valid = false;
    }

    if (!valid) e.preventDefault();
});
</script>

</body>
</html>
