<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title><link rel="stylesheet" href="chat.css">
<script src="chat.js" defer></script>
    <link rel="stylesheet" href="style2.css">

</head>
<body>
    <section class="center-form">
    <form id="loginForm" class="form-box" method="POST" action="process_login.php">
        <h2>Log in</h2>
        <input type="email" id="emailInput" name="username" placeholder="Email" required>
        <input type="password" id="passwordInput" name="password" placeholder="Password" required>
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
</body>
<script>
  const loginForm = document.getElementById('loginForm');
const emailInput = document.getElementById('emailInput');
const passwordInput = document.getElementById('passwordInput');

const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

loginForm.addEventListener('submit', function(e) {
    const password = passwordInput.value.trim();
    if (!passwordRegex.test(password)) {
        e.preventDefault(); 
        alert("Password duhet të ketë min 8 karaktere, shkronjë të madhe, të vogël, numër dhe simbol.");
    }
});


</script>




</html>
