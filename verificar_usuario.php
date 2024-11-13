<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparamos la consulta SQL
    $sql = "SELECT * FROM usuarios WHERE email = :email AND password = MD5(:password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    // Si se encuentra un usuario
    if ($stmt->rowCount() > 0) {
        session_start();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['usuario'] = $user['nombre'];
        $_SESSION['rol'] = $user['rol'];
        header("Location: menu.php");  // Redirige al dashboard
        exit();
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>
