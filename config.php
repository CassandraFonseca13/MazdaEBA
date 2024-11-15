<?php
// Comprobar si la función loadEnv ya ha sido declarada
if (!function_exists('loadEnv')) {
    function loadEnv($file)
    {
        if (file_exists($file)) {
            $lines = file($file);
            foreach ($lines as $line) {
                // Ignorar comentarios y líneas vacías
                if (strpos(trim($line), '#') === 0 || trim($line) === '') {
                    continue;
                }
                // Separar clave y valor
                list($key, $value) = explode('=', trim($line), 2);
                // Asignar las variables al espacio de nombres de PHP
                putenv("$key=$value");
            }
        }
    }
}

// Cargar las variables de entorno
loadEnv(__DIR__ . '/.env');

// Conexión a la base de datos
$conn = new mysqli(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_DATABASE'));

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>