<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proteus - Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/logo.jpg" alt="Logo Proteus">
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="inicio.php">Inicio</a></li>
                <li><a href="comprar.php">Comprar</a></li>
                <li><a href="atencion_cliente.php">Atención al cliente</a></li>
                <li><a href="reserva_online.php">Reserva online</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>

    <section id="dashboard-content">
        <h1>Bienvenido al Dashboard, <?php echo $_SESSION['email']; ?>!</h1>
        <p>Aquí puedes administrar tu cuenta y acceder a las funciones del sistema.</p>

        <div class="dashboard-section">
            <h2>Reservas</h2>
            <p>Gestiona tus reservas de parqueo.</p>
            <a href="reserva_online.php">Ir a Reservas</a>
        </div>

        <div class="dashboard-section">
            <h2>Compras</h2>
            <p>Revisa y administra tus compras.</p>
            <a href="comprar.php">Ver Compras</a>
        </div>

        <div class="dashboard-section">
            <h2>Atención al Cliente</h2>
            <p>Contacta con nuestro equipo de soporte.</p>
            <a href="atencion_cliente.php">Ir a Soporte</a>
        </div>
    </section>

    <footer>
        <p>Proteus © 2024. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
