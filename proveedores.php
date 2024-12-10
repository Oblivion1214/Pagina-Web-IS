<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proveedores</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">    
        <a href="inicio.php" class="button">Inicio</a>
        <a href="insertar_producto.php" class="button">Agregar stock</a>
        <a href="Nuevo_producto.php" class="button">Nuevo producto</a>
        <a href="logout.php" class="button logout-button">Cerrar sesión</a> <!-- Botón de cierre de sesión -->
    </div>
</body>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #333;
        margin: 0;
        padding: 0;
        color: #fff;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        color: #333;
    }

    .button {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1em;
        transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        text-align: center;
        display: block;
        margin: 20px auto 0;
        text-decoration: none;
    }

    .button:hover {
        background-color: #45a049;
    }

    .logout-button {
        background-color: #f44336; /* Rojo para indicar cierre de sesión */
    }

    .logout-button:hover {
        background-color: #d32f2f;
    }

    h1 {
        text-align: center;
    }

    .proveedores-lista {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    .proveedor {
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }

    .proveedor:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .proveedor h2 {
        margin: 0;
        font-size: 1.2em;
        color: #444;
    }

    .proveedor p {
        margin: 10px 0 0;
        color: #666;
    }
</style>
</html>
