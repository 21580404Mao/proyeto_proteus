// Función para manejar el inicio de sesión
function handleLogin(event) {
    event.preventDefault();  // Prevenimos que el formulario recargue la página

    // Obtenemos los valores del formulario
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Simulamos una llamada al backend para verificar credenciales
    fetch('index.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ email: email, password: password })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Inicio de sesión exitoso');
            console.log("Redirigiendo al menú principal...");
            setTimeout(function() {
                window.location.href = "menu.php";  // Redirige al dashboard o menú principal
            }, 1000);  // Redirige después de 1 segundo
        } else {
            alert('Email o contraseña incorrectos.');
        }
    })
    .catch(error => console.error('Error:', error));
}

// Función para manejar la navegación a los diferentes módulos
function navigateTo(page) {
    window.location.href = page;
}

// Añadimos el evento al formulario de login cuando se envía
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.querySelector('.login-form form');
    if (loginForm) {
        loginForm.addEventListener('submit', handleLogin);
    }

    // Añadimos eventos a los botones del menú si existen
    const menuItems = document.querySelectorAll('.navbar ul li a');
    menuItems.forEach((item) => {
        item.addEventListener('click', function(event) {
            event.preventDefault();  // Evitar comportamiento por defecto
            const targetPage = event.target.getAttribute('href');  // Obtenemos el destino
            navigateTo(targetPage);  // Redirigimos a la página correspondiente
        });
    });
});
