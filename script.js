// Get elements
const modal = document.getElementById('authModal');
const loginBtn = document.getElementById('loginBtn');
const closeModal = document.getElementById('closeModal');
const showRegister = document.getElementById('showRegister');
const showLogin = document.getElementById('showLogin');
const loginForm = document.querySelector('.login-form');
const registerForm = document.querySelector('.register-form');

// Open modal
if (loginBtn) {
    loginBtn.addEventListener('click', () => {
        modal.classList.add('active');
    });
}

// Close modal
closeModal.addEventListener('click', () => {
    modal.classList.remove('active');
});

// Close modal when clicking outside
window.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.classList.remove('active');
    }
});

// Switch to register form
if (showRegister) {
    showRegister.addEventListener('click', (e) => {
        e.preventDefault();
        loginForm.classList.remove('active');
        registerForm.classList.add('active');
    });
}

// Switch to login form
if (showLogin) {
    showLogin.addEventListener('click', (e) => {
        e.preventDefault();
        registerForm.classList.remove('active');
        loginForm.classList.add('active');
    });
}

// Auto-hide alerts after 5 seconds
setTimeout(() => {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.animation = 'slideOutRight 0.3s ease';
            setTimeout(() => alert.remove(), 300);
        }, 5000);
    });
}, 100);

// Add slideOut animation
const style = document.createElement('style');
style.textContent = `
    @keyframes slideOutRight {
        from {
            opacity: 1;
            transform: translateX(0);
        }
        to {
            opacity: 0;
            transform: translateX(100px);
        }
    }
`;
document.head.appendChild(style);