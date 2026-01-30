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
        <form class="form-box">
            <h2>Log in</h2>
           
            <input type="email" placeholder="Email" required>
            <input type="password" placeholder="Password" required>
            <button type="submit" class="btn"><a href="../Dashboard/index.php"class="btn a">Log in</a></button>
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
    e.preventDefault();

    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();

    if (email === "" || password === "") {
      alert("Ju lutem plotësoni të gjitha fushat.");
      return;
    }

    if (!passwordRegex.test(password)) {
      alert("Password duhet të ketë min 8 karaktere, shkronjë të madhe, të vogël, numër dhe simbol.");
      return;
    }

    
    window.location.href = "../Dashboard/index.php";
  });
</script>


</html>
