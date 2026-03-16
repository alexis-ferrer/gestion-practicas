<?php
// Iniciar sesión solo si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Función para verificar rol
function verificarRol($rolPermitido) {
    if ($_SESSION['rol'] !== $rolPermitido) {
        header("Location: ../no_autorizado.php");
        exit();
    }
}
?>