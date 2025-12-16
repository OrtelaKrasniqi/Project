
document.addEventListener('DOMContentLoaded', () => {
  const toggleBtn = document.getElementById('chat-toggle-btn');
  const chatPanel = document.getElementById('chatbox-panel');
  const closeBtn = document.getElementById('chat-close-btn');
  const sendBtn = document.getElementById('send-btn');
  const chatInput = document.querySelector('#chatbox-input input');
  const chatMessages = document.getElementById('chatbox-messages');

  
  toggleBtn.addEventListener('click', () => {
    chatPanel.style.display = 'flex';
    toggleBtn.style.display = 'none';
  });

 
  closeBtn.addEventListener('click', () => {
    chatPanel.style.display = 'none';
    toggleBtn.style.display = 'inline-block';
  });

  
  sendBtn.addEventListener('click', () => {
    if (chatInput.value.trim() !== '') {
      const msg = document.createElement('p');
      msg.textContent = chatInput.value;
      chatMessages.appendChild(msg);
      chatInput.value = '';
      chatMessages.scrollTop = chatMessages.scrollHeight; 
    }
  });

  
  chatInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
      sendBtn.click();
    }
  });
});
