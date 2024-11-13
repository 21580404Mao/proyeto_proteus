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
    <title>Inicio - Proteus</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Bienvenido a Proteus</h1>
        <?php include('menu.php'); ?>
    </header>

    <section>
        <h2>¿Qué es Proteus?</h2>
        <p>Proteus es un sistema de gestión de parqueaderos que permite a los usuarios realizar reservas, compras y gestionar su información de manera efectiva.</p>
    </section>

    <footer>
        <p>Proteus © 2024. Todos los derechos reservados.</p>
    </footer>
</body>
</html>