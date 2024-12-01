<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE ProductoID = $id";
    $resultProducto = $conn->query($sql);

    if ($resultProducto->num_rows > 0) {
        $row = $resultProducto->fetch_assoc();
    } else {
        echo "Producto no encontrado.";
        exit;
    }
} else {
    echo "ID de producto no especificado.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Producto</title>
    <link rel="stylesheet" href="styles_productos.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            text-align: center;
            padding: 20px;
        }
        .producto-detalle {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .producto-detalle img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .producto-detalle h3 {
            font-size: 24px;
            margin: 20px 0;
        }
        .producto-detalle p {
            font-size: 18px;
            margin: 10px 0;
        }
        .back-button, .add-cart-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .back-button:hover, .add-cart-button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <div class="menu-toggle" id="mobile-menu">
            ☰ Menú
        </div>
        <nav class="navbar">
            <ul class="menu">
                <li><a href="inicio.php">Inicio</a></li>
                <li><a href="productos.php">Productos</a></li>
                <li><a href="clientes.php">Clientes</a></li>
                <li><a href="proveedores.php">Proveedores</a></li>
                <li><a href="carrito.php">Carrito</a></li>
                <li><a href="editar_datos.php">Editar datos</a></li>
                <li><a href="login.php">Mi cuenta (Cerrar sesión)</a></li>
                <li><a href="suscripcion.php">Suscripción</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <img src="imagenes/logo.png" alt="">
    </div>
    <div class="container">
        <h1>Detalles del Producto</h1>
        <div class="producto-detalle">
            <img src="<?php echo $row['Imagen']; ?>" alt="<?php echo $row['Nombre']; ?>">
            <h3><?php echo $row['Nombre']; ?></h3>
            <p>Stock: <?php echo $row['Stock']; ?></p>
            <p>Precio: $<?php echo $row['PrecioCliente']; ?></p>
            <p>Descripción: <?php echo $row['Descripcion']; ?></p>
        </div>
        <a href="javascript:history.back()" class="back-button">Volver a Productos</a>
        <button class="add-cart-button" onclick="addToCart(<?php echo $row['ProductoID']; ?>)">Añadir a Carrito</button>
    </div>
    <script>
        function addToCart(productId) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert("Producto añadido satisfactoriamente");
                }
            };
            xhttp.open("POST", "agregar_carrito.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id=" + productId);
        }
    </script>
</body>
</html>
