<?php
$servername = "localhost";
$username = "root";   // tu usuario de MySQL
$password = "";       // tu contraseña de MySQL
$dbname = "gestion_practicas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>