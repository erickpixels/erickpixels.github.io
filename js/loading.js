window.addEventListener('load', () => {
    const splashScreen = document.getElementById('splash-screen');
    const loginForm = document.getElementById('login-form');

    setTimeout(() => {
        splashScreen.style.display = 'none';
        loginForm.style.display = 'block';
    }, 3000); // 3 segundos de splash screen
});
