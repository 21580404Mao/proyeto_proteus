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
    <title>Comprar - Proteus</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Comprar Servicios de Parqueo</h1>
        <?php include('menu.php'); ?>
    </header>

    <section>
        <h2>Servicios Disponibles</h2>
        <ul>
            <li>Compra de pases diarios</li>
            <li>Suscripción mensual</li>
            <li>Reserva de estacionamiento VIP</li>
        </ul>
        <button>Comprar Ahora</button>
    </section>

    <footer>
        <p>Proteus © 2024. Todos los derechos reservados.</p>
    </footer>
</body>
</html>