<?php
session_start();
require_once "../includes/seguridad.php";
verificarRol("admin"); // Solo admins pueden entrar
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administración</title>
</head>
<body>
    <h1>Bienvenido al Panel de Administración</h1>
    <p>Aquí podrás gestionar usuarios, proyectos y asignaciones.</p>
</body>
</html>