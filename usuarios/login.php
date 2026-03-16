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
            $_SESSION['id_usuario'] = $usuario['id_usuario'];

            // 🔹 Redirigir según el rol
            if ($usuario['rol'] == 'admin') {
                header("Location: ../admin/admin_panel.php");
                exit();
            } elseif ($usuario['rol'] == 'estudiante') {
                header("Location: ../estudiante/estudiante_panel.php");
                exit();
            } elseif ($usuario['rol'] == 'tutor') {
                header("Location: ../tutor/tutor_panel.php");
                exit();
            } elseif ($usuario['rol'] == 'empresa') {
                header("Location: ../empresa/empresa_panel.php");
                exit();
            }
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
