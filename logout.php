<?php
// Iniciar la sesión
session_start();

// Destruir la sesión
session_destroy();

// Redirigir al usuario al login
header('Location: index.php');
exit();
?>