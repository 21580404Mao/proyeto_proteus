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
    <title>Reserva Online - Proteus</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Reserva Online</h1>
        <?php include('menu.php'); ?>
    </header>

    <section>
        <h2>Realizar una Reserva</h2>
        <form method="POST" action="procesar_reserva.php">
            <label for="fecha">Fecha de Reserva:</label>
            <input type="date" id="fecha" name="fecha" required>

            <label for="hora">Hora de Reserva:</label>
            <input type="time" id="hora" name="hora" required>

            <label for="tipo">Tipo de Reserva:</label>
            <select id="tipo" name="tipo">
                <option value="general">General</option>
                <option value="vip">VIP</option>
            </select>

            <button type="submit">Reservar</button>
        </form>
    </section>

    <footer>
        <p>Proteus © 2024. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
