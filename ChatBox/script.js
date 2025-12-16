const chatButton = document.getElementById("chat-button");
const chatbox = document.getElementById("chatbox");
const sendBtn = document.getElementById("send-btn");
const input = document.getElementById("message");
const chatMessages = document.getElementById("chat-messages");


chatButton.addEventListener("click", () => {
    chatbox.style.display =
        chatbox.style.display === "none" ? "block" : "none";
});


sendBtn.addEventListener("click", sendMessage);

input.addEventListener("keypress", (e) => {
    if (e.key === "Enter") {
        sendMessage();
    }
});

function sendMessage() {
    const message = input.value.trim();
    if (message === "") return;

    chatMessages.innerHTML += `<p><strong>You:</strong> ${message}</p>`;
    input.value = "";
    chatMessages.scrollTop = chatMessages.scrollHeight;
}
