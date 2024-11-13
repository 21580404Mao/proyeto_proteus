<?php
// Incluir el archivo de conexión
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario de registro
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $correo = isset($_POST['correo']) ? $_POST['correo'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
    $contrasena = isset($_POST['contrasena']) ? password_hash($_POST['contrasena'], PASSWORD_BCRYPT) : null;
    $tipo_usuario = "usuario"; // Puedes ajustar esto según sea necesario, por ejemplo "usuario" o "admin"

    // Verificar que todos los campos están completos
    if ($nombre && $correo && $telefono && $contrasena) {
        try {
            // Comprobar si el usuario ya existe
            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = :correo");
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "El usuario ya existe.";
            } else {
                // Insertar el nuevo usuario en la base de datos
                $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, telefono, contrasena, tipo_usuario) 
                                        VALUES (:nombre, :correo, :telefono, :contrasena, :tipo_usuario)");
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':correo', $correo);
                $stmt->bindParam(':telefono', $telefono);
                $stmt->bindParam(':contrasena', $contrasena);
                $stmt->bindParam(':tipo_usuario', $tipo_usuario);

                if ($stmt->execute()) {
                    echo "Registro exitoso. Redirigiendo a la página de inicio de sesión...";
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Error al registrar el usuario.";
                }
            }
        } catch (PDOException $e) {
            echo "Error en el registro: " . $e->getMessage();
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Proteus</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Registro</h2>
    <form method="POST" action="register.php">
        <label for="nombre">Nombre completo:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>

        <button type="submit">Registrarse</button>
    </form>
</body>
</html>
