<?php
include 'config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['Correo'];
    $contrasena = $_POST['Contrasena'];

    $sql = "SELECT * FROM USUARIO WHERE CorreoElectronico = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($contrasena, $usuario['Contrasena'])) {
            $_SESSION['usuarioID'] = $usuario['UsuarioID'];
            $_SESSION['correo'] = $usuario['CorreoElectronico'];
            header("Location: productos.php");
        } else {
            echo "<p>Contraseña incorrecta.</p>";
        }
    } else {
        echo "<p>El usuario o correo no existe.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style type="text/css">
        /* Agregar estilos aquí */
    </style>
</head>
<body>
    <section>
        <form method="POST" action="login.php">
            <h1>Inicio de sesión</h1>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="email" name="Correo" id="Correo" required>
                <label for="email">Correo Electrónico</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="Contrasena" id="password" required>
                <label for="password">Contraseña</label>
            </div>
            <div class="forget">
                <label for="remember"><input type="checkbox" id="remember">Recordar</label>
                <a href="#">Olvidé la contraseña</a>
            </div>
            <button type="submit">Iniciar sesión</button>
            <div class="register">
                <p>No tengo una cuenta <a href="register.php">registrar</a></p>
            </div>
        </form>
    </section>
</body>
</html>

<style type="text/css">
        *{
        margin:0;
        padding: 0;
        box-sizing: border-box; 
        font-family: 'poppins', sans-serif;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-image: url("imagenes/fondo2.jpeg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        section{
            position: relative;
            max-width:400px;
            background-color: transparent;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            backdrop-filter: blur(55px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem 3rem;
        }
        .inputbox input{
            width: 100%;
            height: 60px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1rem;
            padding: 0 35px 0 5px;
            color: #fff;
        }
        .inputbox ion-icon{
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2rem;
            top: 20px;
        }
        .forget{
            margin: 35px 0;
            font-size: 0.85rem;
            color: #fff;
            display: flex;
            justify-content: space-between;
        }
        h1{
            font-size: 2rem;
            color: #fff;
            text-align: center;
        }
        .inputbox{
            position: relative;
            margin: 30px 0;
            max-width: 310px;
            border-bottom: 2px solid  #fff;
        }
        .inputbox label{
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY( -50% );
            color: #fff;
            font-size: 1rem;
            pointer-events: none;
            transition: all 0.5% ease-in-out0;
        }
        input:focus~label,
        input:valid~label{
            top: -5px;
        }
        .forget label{
            display: flex;
            align-items: center;
        }
        .forget label-input{
            margin-right: 3px;
        }
        .forget a{
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }
        .forget a:hover{
            text-decoration: underline;
        }
        button{
            width: 100%;
            height: 40px;
            border-radius: 40px;
            background-color: rgba(255, 255, 255, 1);
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.4% ease;
        }
        button:hover{
            background-color: rgba(255, 255, 255, 0.5)
        }
        .register{
            font-size: 0.9rem;
            color: #fff;
            text-align: center;
            margin: 25px 0 10px;
        }
        .register p a{
            text-decoration: none;
            color: #fff;
            font-weight: 600;
        }
        .register p a:hover{
            text-decoration: underline;
        }
    </style>
</html>