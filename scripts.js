// Función para manejar el inicio de sesión
function handleLogin(event) {
    event.preventDefault(); // Evitar que el formulario recargue la página

    // Obtenemos los valores del formulario
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Enviar una solicitud AJAX a PHP para verificar credenciales
    fetch('index.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ email, password })
    })
    .then(response => response.text())
    .then(data => {
        if (data.includes('exitoso')) {
            alert('Inicio de sesión exitoso');
            console.log("Redirigiendo al menú principal...");
            setTimeout(function() {
                window.location.href = "menu.php"; // Redirige al menú principal
            }, 1000); // 1 segundo de retraso antes de la redirección
        } else {
            alert('Email o contraseña incorrectos.');
        }
    })
    .catch(error => console.error('Error en la solicitud:', error));
}

// Añadir evento al formulario de login cuando se envía
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.querySelector('.login-form form');
    if (loginForm) {
        loginForm.addEventListener('submit', handleLogin);
    }

    // Función para el botón "APRENDER MÁS..."
    const learnMoreBtn = document.getElementById('learnMoreBtn');
    if (learnMoreBtn) {
        learnMoreBtn.addEventListener('click', function() {
            alert("Proteus es una plataforma innovadora para la gestión de parqueaderos. Ofrecemos soluciones de reserva online, atención al cliente y mucho más.");
        });
    }
});
