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
    <title>Blog - Proteus</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Blog</h1>
        <?php include('menu.php'); ?>
    </header>

    <section>
        <h2>Últimas Publicaciones</h2>
        <article>
            <h3>Nuevas funcionalidades en Proteus</h3>
            <p>En el mes de septiembre, hemos implementado nuevas funcionalidades para mejorar la experiencia del usuario...</p>
        </article>
    </section>

    <footer>
        <p>Proteus © 2024. Todos los derechos reservados.</p>
    </footer>
</body>
</html>