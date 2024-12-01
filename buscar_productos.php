<?php
include 'config.php';

if (isset($_POST['busqueda'])) {
    $busqueda = $_POST['busqueda'];

    $sql = "SELECT * FROM productos WHERE Nombre LIKE '%$busqueda%'";
    $resultProductos = $conn->query($sql);

    if ($resultProductos->num_rows > 0) {
        while ($row = $resultProductos->fetch_assoc()) {
            echo "<div class='producto'>";
            echo "<img src='" . $row["Imagen"] . "' alt='" . $row["Nombre"] . "'>";
            echo "<h3>" . $row["Nombre"] . "</h3>";
            echo "<p>Stock: " . $row["Stock"] . "</p>";
            echo "<p>Precio: $" . $row["PrecioCliente"] . "</p>";
            echo "<p>Descripción: " . $row["Descripcion"] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No hay productos disponibles.";
    }
} else {
    echo "Parámetro de búsqueda no definido.";
}
?>

