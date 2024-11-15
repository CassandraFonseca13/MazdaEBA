<?php
session_start();
// Incluir el archivo de configuración
require 'config.php';

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username']; // Obtener el nombre del usuario desde la sesión
} else {
  $username = "Invitado"; // Mostrar "Invitado" si no está logueado
}

// Obtener el nombre del servidorc  
 $server_name = gethostname();
 

// Obtener la dirección IP del cliente
$local_ip = gethostbyname(gethostname());


// Verificar el estado de la conexión
$connection_status = $conn ? "Conectado" : "Error al conectar";
