<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="styles_productos.css">
</head>
<body>
    <header>
        <div class="menu-toggle" id="mobile-menu">
            ☰ Menú
        </div>
        <nav class="navbar">
            <ul class="menu">
                <li><a href="inicio.php">Inicio</a></li>
                <li>
                    <form onsubmit="buscarProducto(event)">
                        <input type="text" id="busquedaProducto" placeholder="Buscar producto...">
                        <button type="submit">Buscar</button>
                    </form>
                </li>
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
    <h1>Productos</h1>

    <div class="filters">
        <label for="precioFiltro">Filtrar por Precio (Precio Maximo):</label>
        <input type="number" id="precioFiltro" placeholder="Precio">
        <button onclick="filtrarPorPrecio()">Filtrar</button>
        <label for="nombreFiltro">Ordenar por Nombre:</label>
        <select id="nombreFiltro" onchange="ordenarPorNombre()">
            <option value="asc">A-Z</option>
            <option value="desc">Z-A</option>
        </select>
    </div>

    <div id="productosContainer">
        <?php
        include 'config.php';

        $sql = "SELECT * FROM productos";
        $resultProductos = $conn->query($sql);

        if ($resultProductos->num_rows > 0) {
            while ($row = $resultProductos->fetch_assoc()) {
                echo "<div class='producto'>";
                echo "<img src='" . $row["Imagen"] . "' alt='" . $row["Nombre"] . "'>";
                echo "<h3>" . $row["Nombre"] . "</h3>";
                echo "<p>Stock: " . $row["Stock"] . "</p>";
                echo "<p>Precio: $" . $row["PrecioCliente"]*1.15 . "</p>";
                echo "<p>Descripción: " . $row["Descripcion"] . "</p>";
                echo "<button onclick=\"verDetalles(" . $row['ProductoID'] . ")\">Ver detalles</button>";
                echo "</div>";
            }
        } else {
            echo "No hay productos disponibles.";
        }
        ?>
    </div>

    <script>
        document.getElementById('mobile-menu').addEventListener('click', function() {
            document.querySelector('.menu').classList.toggle('active');
        });

        function buscarProducto(event) {
            event.preventDefault();
            var busqueda = document.getElementById('busquedaProducto').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('productosContainer').innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "buscar_productos.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("busqueda=" + busqueda);
        }

        function filtrarPorPrecio() {
            var precioFiltro = document.getElementById('precioFiltro').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('productosContainer').innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "filtrar_productos.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("precio=" + precioFiltro);
        }

        function ordenarPorNombre() {
            var orden = document.getElementById('nombreFiltro').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('productosContainer').innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "ordenar_productos.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("orden=" + orden);
        }

        function verDetalles(id) {
            window.location.href = "detalles_producto.php?id=" + id;
        }
    </script>
</body>
</html>
