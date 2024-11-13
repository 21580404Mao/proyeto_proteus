<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['correo'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Proteus</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Contacto</h1>
        <?php include('menu.php'); ?>
    </header>

    <section>
        <h2>Formulario de Contacto</h2>
        <form method="POST" action="enviar_contacto.php">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" required></textarea>

            <button type="submit">Enviar</button>
        </form>
    </section>

    <footer>
        <p>Proteus © 2024. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
