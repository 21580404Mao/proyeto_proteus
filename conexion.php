<?php
// Datos de conexión
$host = "localhost";
$dbname = "proteus_parqueadero";
$username = "root";
$password = ""; // Dejar en blanco si no tiene contraseña

try {
    // Crear una conexión PDO
    $conn = new PDO ("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Configurar errores PDO para que arroje excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Conectado correctamente";
} catch (PDOException $e) {
    // Manejo de errores en la conexión
    die("Error en la conexión: " . $e->getMessage());
}
?>


