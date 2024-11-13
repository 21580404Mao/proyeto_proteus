<?php
// Incluir el archivo de conexión
require 'conexion.php';
session_start();  // Iniciar sesión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    try {
        // Buscar el usuario en la base de datos
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = :correo");
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();
        
        // Verificar si el usuario existe y la contraseña es correcta
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($contrasena, $user['contrasena'])) {
                // Iniciar sesión
                $_SESSION['logged_in'] = true;  // Marcar sesión como activa
                $_SESSION['id_usuario'] = $user['id'];  // Guardar el ID del usuario
                $_SESSION['correo'] = $correo;  // Guardar el correo (opcional)

                // Redirigir al menú principal (menu.php)
                header('Location: menu.php');
                exit();
            } else {
                $error_message = "Correo o contraseña incorrectos.";
            }
        } else {
            $error_message = "Correo o contraseña incorrectos.";
        }
    } catch (PDOException $e) {
        echo "Error en la conexión: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proteus - Sistema de Información de Parqueadero</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <img src="img/logo.jpg" alt="logo">
        <h1>Sistema de información parqueadero público Proteus</h1>
    </header>
    
    <section class="banner">
        <h2>Parqueadero Proteus</h2>
        <p>Un servicio de estacionamiento confiable</p>
    </section>
    
    <section class="main-content">
        <div class="image-left">
            <img src="img/Conductor.png" alt="Conductor">
        </div>
        <div class="login-form">
            <h3>Iniciar Sesión</h3>
            <?php if (isset($error_message)): ?>
                <p style="color:red;"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <form method="POST" action="">
                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo" required>
                
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
                
                <button type="submit">Iniciar Sesión</button>
            </form>
            <form action="register.php" method="get">
                <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                    Registrar
                </button>
            </form>
        </div>
    </section>
    
    <footer>
        <p>Vigilado superintendencia de industria y comercio - personería N° 320 de junio de 1980 - Resolución N° 1630 del 30 de diciembre de 1989 para parqueadero Proteus © Todos los derechos reservados 2024</p>
        <div class="social-icons">
            <a href="https://www.facebook.com/tu_usuario" target="_blank">
                <img src="img/facebook.png" alt="Facebook">
            </a>
            <a href="https://wa.me/1234567890" target="_blank">
                <img src="img/whatsapp.png" alt="WhatsApp">
            </a>
            <a href="https://twitter.com/tu_usuario" target="_blank">
                <img src="img/x.png" alt="X (Twitter)">
            </a>
        </div>
    </footer>
</body>
</html>