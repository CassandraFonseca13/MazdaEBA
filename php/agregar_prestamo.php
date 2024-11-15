<?php
// Incluye la configuración de la conexión a la base de datos
include '../config.php';

// Verifica si se enviaron los datos a través del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $nombre = $_POST['nombre'];
    $folio = $_POST['folio'];
    $fechaPrestamo = $_POST['fechaPrestamo'];
    $fechaEntrega = $_POST['fechaEntrega'];
    $estado = $_POST['estado'];
    $sku = $_POST['sku'];
    $herramienta = $_POST['herramienta'];
    $cantidad = $_POST['cantidad'];

    // Prepara la consulta SQL para insertar los datos
    $sql = "INSERT INTO prestamos_herramientas (nombre_empleado, numero_folio, fecha_prestamo, fecha_entrega, estado, sku, herramienta, cantidad) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepara la sentencia usando $conn en lugar de $connection
    $stmt = mysqli_prepare($conn, $sql);

    // Verifica si la preparación fue exitosa
    if ($stmt) {
        // Liga los parámetros a la consulta
        mysqli_stmt_bind_param($stmt, "sssssssi", $nombre, $folio, $fechaPrestamo, $fechaEntrega, $estado, $sku, $herramienta, $cantidad);

        // Ejecuta la consulta
        if (mysqli_stmt_execute($stmt)) {
            echo "Préstamo agregado correctamente.";
            // Redirige a la página de visualización de registros
            header("Location: resgistro.php");
            exit();
        } else {
            echo "Error al agregar el préstamo: " . mysqli_error($conn);
        }

        // Cierra la sentencia
        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la preparación de la consulta: " . mysqli_error($conn);
    }

    // Cierra la conexión
    mysqli_close($conn);
}
?>
