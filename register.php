<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['Usuario'];
    $correo = $_POST['Correo'];
    $contrasena = $_POST['Contrasena'];
    $confirmContrasena = $_POST['ConfirmContrasena'];

    // Validaciones
    $errores = [];
    
    // Validar correo
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del correo electrónico no es válido.";
    }

    // Validar contraseñas coincidentes
    if ($contrasena !== $confirmContrasena) {
        $errores[] = "Las contraseñas no coinciden.";
    }

    // Verificar si el usuario o correo ya existen
    $sqlUsuario = "SELECT * FROM USUARIO WHERE Usuario = ? OR CorreoElectronico = ?";
    $stmt = $conn->prepare($sqlUsuario);
    $stmt->bind_param("ss", $usuario, $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $errores[] = "El usuario o correo ya existe.";
    }

    // Si no hay errores, insertar nuevo usuario
    if (empty($errores)) {
        $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);
        $sqlInsert = "INSERT INTO USUARIO (Usuario, CorreoElectronico, Contrasena) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sqlInsert);
        $stmt->bind_param("sss", $usuario, $correo, $hashedPassword);

        if ($stmt->execute()) {
            echo "Registro exitoso. ¡Bienvenido!";
            header("Location: productos.php");
        } else {
            $errores[] = "Error al registrar el usuario.";
        }
    }

    foreach ($errores as $error) {
        echo "<p>$error</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Registro</title>
    <style>
    /* Agregar estilos aquí */
    </style>
</head>
<body>
    <section class="form-register">
        <h4>Formulario Registro</h4>
        <form method="POST" action="register.php">
            <input class="controls" type="text" name="Usuario" id="Usuario" placeholder="Usuario" required>
            <input class="controls" type="email" name="Correo" id="Correo" placeholder="Ingrese su Correo" required>
            <input class="controls" type="password" name="Contrasena" id="Contrasena" placeholder="Ingrese su Contraseña" required>
            <input class="controls" type="password" name="ConfirmContrasena" id="ConfirmContrasena" placeholder="Confirme su Contraseña" required>
            <p>Estoy de acuerdo con <a href="#">Terminos y condiciones</a></p>
            <input class="buttons" type="submit" value="Registrar">
            <p><a href="login.php">¿Ya tengo cuenta?</a></p>
        </form>
    </section>
</body>
</html>

<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;

    }
    body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ff69b4, #8a2be2); /* Fondo degradado llamativo */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }

    .form-register{
        width: 400px;
        background: #24303c;
        padding: 30px;
        margin: auto;
        margin-top: 100px;    
        border-radius: 4px;
        font-family: 'calibri';
        color: white;
        box-shadow: 7px 13px 37px #000;
    }

    .form-register h4{
        font-family: 22px;
        margin-bottom: 20px;
    }
    .controls{
        width: 100%;
        background: #24303c;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 16px;
        border: 1px solid #1f53c5; 
        font-family: 'calibri';
        font-size: 18px;
        color: white;
    }
    .form-register p{
        height: 40px;
        text-align: center;
        font-size: 18px;
        
    }
    .form-register a{
        color: white;
        text-decoration: none;
    }
    .form-register a:hover{
        color: white;
        text-decoration: underline;
    }
    .form-register .buttons{
        width: 100%;
        background: #1f53c5;
        border: none;
        padding: 12px;
        color: white;
        margin:16px;
        font-size: 16px;
        width: calc(100% -32px);
        text-align: center;
        margin: 16px auto;

    }
    </style>
</html>