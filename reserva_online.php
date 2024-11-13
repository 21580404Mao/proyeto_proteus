<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que los datos del formulario estén disponibles
    if (empty($_POST['id_vehiculo']) || empty($_POST['fecha']) || empty($_POST['hora']) || empty($_POST['id_usuario'])) {
        echo "Error: Datos de reserva incompletos.";
        exit();
    }

    // Obtener los valores del formulario
    $id_usuario = $_POST['id_usuario']; // Usuario que realiza la reserva
    $id_vehiculo = $_POST['id_vehiculo'];
    $fecha_reserva = $_POST['fecha'];
    $hora_reserva = $_POST['hora'];

    // Incluir el archivo de conexión
    include('conexion.php');

    // Verificar si el ID del vehículo existe en la tabla vehiculos
    $stmt_vehiculo = $conn->prepare("SELECT id FROM vehiculos WHERE id = :id_vehiculo");
    $stmt_vehiculo->bindParam(':id_vehiculo', $id_vehiculo, PDO::PARAM_INT);
    $stmt_vehiculo->execute();

    if ($stmt_vehiculo->rowCount() == 0) {
        echo "Error: El vehículo con el ID proporcionado no existe.";
        exit();
    }

    // Preparar la consulta SQL para insertar la reserva
    $sql = "INSERT INTO reservas (id_usuario, id_vehiculo, fecha_reserva, hora_reserva, estado, fecha_creacion) 
            VALUES (:id_usuario, :id_vehiculo, :fecha_reserva, :hora_reserva, 'pendiente', NOW())";
    $stmt = $conn->prepare($sql);

    // Asociar los parámetros a la consulta
    $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->bindValue(':id_vehiculo', $id_vehiculo, PDO::PARAM_INT);
    $stmt->bindValue(':fecha_reserva', $fecha_reserva);
    $stmt->bindValue(':hora_reserva', $hora_reserva);

    // Ejecutar la consulta y verificar el resultado
    if ($stmt->execute()) {
        echo "<p>Reserva realizada exitosamente.</p>";
    } else {
        echo "<p>Error al realizar la reserva. Por favor, inténtalo de nuevo.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Online - Proteus</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    /* CSS para centrar el formulario y diseño general */
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        #form-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Estilos para el pie de página */
        footer {
            margin-top: 20px;
            text-align: center;
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div id="form-container">
        <h2>Realizar una Reserva</h2>
        <form method="POST" action="">
            <label for="id_usuario">ID del Usuario:</label>
            <input type="number" id="id_usuario" name="id_usuario" required>

            <label for="id_vehiculo">ID del Vehículo:</label>
            <input type="number" id="id_vehiculo" name="id_vehiculo" required>

            <label for="fecha">Fecha de Reserva:</label>
            <input type="date" id="fecha" name="fecha" required>

            <label for="hora">Hora de Reserva:</label>
            <input type="time" id="hora" name="hora" required>

            <button type="submit">Reservar</button>
        </form>
    </div>

    <footer>
        <p>Proteus © 2024. Todos los derechos reservados.</p>
        <p>Vigilado por la superintendencia de industria y comercio, personería N° 320 de junio de 1980 - Resolución N° 1630 del 30 de diciembre de 1989</p>
    </footer>
</body>
</html>
