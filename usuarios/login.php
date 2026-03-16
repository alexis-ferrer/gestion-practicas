<?php
session_start();
include("../includes/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';

    $sql = "SELECT * FROM usuarios WHERE correo='$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        if (password_verify($contraseña, $usuario['contraseña'])) {
            // Guardar datos en sesión
            $_SESSION['usuario'] = $usuario['nombre'];
            $_SESSION['rol'] = $usuario['rol'];

            echo "✅ Bienvenido, " . $usuario['nombre'] . " (Rol: " . $usuario['rol'] . ")";
            // Aquí puedes redirigir según el rol:
            // if ($usuario['rol'] == 'admin') { header("Location: ../admin/dashboard.php"); }
        } else {
            echo "❌ Contraseña incorrecta";
        }
    } else {
        echo "⚠️ El correo no está registrado";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login de Usuario</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="POST" action="login.php">
        Correo: <input type="email" name="correo" required><br><br>
        Contraseña: <input type="password" name="contraseña" required><br><br>
        <input type="submit" value="Ingresar">
    </form>
</body>
</html>