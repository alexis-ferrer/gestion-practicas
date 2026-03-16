<?php
include("../includes/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol'];

    // Encriptar contraseña
    $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, correo, contraseña, rol) 
            VALUES ('$nombre', '$correo', '$contraseña_hash', '$rol')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario registrado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Formulario de Registro</h2>
    <form method="POST" action="registro.php">
        Nombre: <input type="text" name="nombre" required><br>
        Correo: <input type="email" name="correo" required><br>
        Contraseña: <input type="password" name="contraseña" required><br>
        Rol:
        <select name="rol" required>
            <option value="estudiante">Estudiante</option>
            <option value="tutor">Tutor</option>
            <option value="empresa">Empresa</option>
            <option value="admin">Administrador</option>
        </select><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>