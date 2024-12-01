<?php
include 'config.php';

session_start();
if (!isset($_SESSION['usuarioID'])) {
    header("Location: login.php");
    exit();
}

$usuarioID = $_SESSION['usuarioID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevoCorreo = $_POST['Correo'];
    $nuevaContrasena = $_POST['Contrasena'];
    $confirmContrasena = $_POST['ConfirmContrasena'];

    // Validaciones
    $errores = [];

    if (!filter_var($nuevoCorreo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del correo electrónico no es válido.";
    }

    if ($nuevaContrasena !== $confirmContrasena) {
        $errores[] = "Las contraseñas no coinciden.";
    }

    if (empty($errores)) {
        $hashedPassword = password_hash($nuevaContrasena, PASSWORD_DEFAULT);
        $sqlUpdate = "UPDATE USUARIO SET CorreoElectronico = ?, Contrasena = ? WHERE UsuarioID = ?";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bind_param("ssi", $nuevoCorreo, $hashedPassword, $usuarioID);

        if ($stmt->execute()) {
            echo "Datos actualizados exitosamente.";
        } else {
            $errores[] = "Error al actualizar los datos.";
        }
    }

    foreach ($errores as $error) {
        echo "<p>$error</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Datos</title>
    <style>
    /* Agregar estilos aquí */
    </style>
</head>
<body>
    <section class="form-edit">
        <h4>Editar Datos</h4>
        <form method="POST" action="editar_datos.php">
            <input class="controls" type="email" name="Correo" id="Correo" placeholder="Nuevo Correo" required>
            <input class="controls" type="password" name="Contrasena" id="Contrasena" placeholder="Nueva Contraseña" required>
            <input class="controls" type="password" name="ConfirmContrasena" id="ConfirmContrasena" placeholder="Confirme su Contraseña" required>
            <input class="buttons" type="submit" value="Actualizar Datos">
        </form>
    </section>
</body>
</html>
