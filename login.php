<?php
session_start();
// Incluir el archivo de configuración
require 'config.php';

// Obtener los datos del formulario
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validar que los campos no estén vacíos
if (empty($username) || empty($password)) {
    $_SESSION['error_message'] = 'Por favor ingresa un Usuario y Contraseña.';
    header('Location: index.php');
    exit;
}

// Preparar la consulta para evitar inyecciones SQL
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);

// Ejecutar la consulta
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Obtener los datos del usuario
    $user = $result->fetch_assoc();

    // Guardar el nombre del usuario en la sesión
    $_SESSION['username'] = $user['username']; // Aquí guardamos el nombre en la sesión

    // Redirigir a MenuPrincipal.php en caso de inicio de sesión exitoso
    header("Location: Php/menu.php");
    exit;
} else {
    $_SESSION['error_message'] = 'Usuario o contraseña incorrecta';
    header('Location: index.php');
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>