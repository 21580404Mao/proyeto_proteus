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
    <title>Atención al Cliente - Proteus</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Atención al Cliente</h1>
        <?php include('menu.php'); ?>
    </header>

    <section>
        <h2>Contacto y Soporte</h2>
        <p>Si tiene alguna duda o inconveniente, por favor contáctenos a través de los siguientes medios:</p>
        <ul>
            <li>Email: soporte@proteus.com</li>
            <li>Teléfono: 123-456-7890</li>
        </ul>
    </section>

    <footer>
        <p>Proteus © 2024. Todos los derechos reservados.</p>
    </footer>
</body>
</html>