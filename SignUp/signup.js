const form = document.querySelector('form');
const password = document.querySelector('input[name="password"]');
const confirmPassword = document.querySelector('input[name="confirm-password"]');
const inputs = document.querySelectorAll('.signup-container input');

form.addEventListener('submit', function(e) {
    e.preventDefault();

    if(password.value !== confirmPassword.value){
        alert('Passwords do not match!');
        return;
    }

    alert('Account created successfully! (Simulated)');
    form.reset();
});

function adjustFormForMobile() {
    const container = document.querySelector('.signup-container');
    if(window.innerWidth <= 500){
        container.style.width = '90%';
        container.style.padding = '20px';
    } else {
        container.style.width = '400px';
        container.style.padding = '40px 30px';
    }
}

window.addEventListener('resize', adjustFormForMobile);
window.addEventListener('load', adjustFormForMobile);

inputs.forEach(input => {
    input.addEventListener('focus', () => {
        input.style.boxShadow = '0 0 10px rgba(53, 122, 189, 0.5)';
    });
    input.addEventListener('blur', () => {
        input.style.boxShadow = 'none';
    });
});

