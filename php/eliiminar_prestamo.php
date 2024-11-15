<?php
// Asegurarse de que la conexión a la base de datos esté configurada (basado en tu config actual)
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'eliminar') {
    $folioEliminar = $_POST['folioEliminar'];
    
    // Cambiar 'prestamos' a 'prestamos_herramientas'
    $stmt = $conn->prepare("DELETE FROM prestamos_herramientas WHERE numero_folio = ?");
    $stmt->bind_param("i", $folioEliminar); // El folio parece ser un número entero

    if ($stmt->execute()) {
        echo "Préstamo eliminado con éxito.";
        header("Location: resgistro.php");
    } else {
        echo "Error al eliminar el préstamo: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
