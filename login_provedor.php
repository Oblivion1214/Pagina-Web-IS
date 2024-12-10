<?php
include 'config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $proveedorID = $_POST['ProveedorID'];
    $contrasena = $_POST['pass'];

    $sql = "SELECT * FROM proveedor WHERE ProveedorID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $proveedorID);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $proveedor = $resultado->fetch_assoc();

        if ($contrasena === $proveedor['pass']) {
            $_SESSION['proveedorID'] = $proveedor['ProveedorID'];
            $_SESSION['nombre'] = $proveedor['Nombre'];
            header("Location: proveedores.php"); // Cambia esto a la página que desees redirigir después del login
        } else {
            echo "<p>Contraseña incorrecta.</p>";
        }
    } else {
        echo "<p>El ID de proveedor no existe.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Proveedor</title>
    <style type="text/css">
        /* Estilos definidos aquí */
    </style>
</head>
<body>
    <section>
        <form method="POST" action="login_provedor.php">
            <h1>Inicio de sesión Proveedor</h1>
            <div class="inputbox">
                <ion-icon name="id-card-outline"></ion-icon>
                <input type="number" name="ProveedorID" id="ProveedorID" required>
                <label for="ProveedorID">ID Proveedor</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="pass" id="password" required>
                <label for="password">Contraseña</label>
            </div>
            <button type="submit">Iniciar sesión</button>
            <div class="register">
                <p>¿No tienes acceso? Contacta al administrador.</p>
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
