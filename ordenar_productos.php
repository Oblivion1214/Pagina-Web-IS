<?php
include 'config.php';

$orden = $_POST['orden'];
$orderBy = $orden == 'asc' ? 'ASC' : 'DESC';

$sql = "SELECT * FROM productos ORDER BY Nombre $orderBy";
$resultProductos = $conn->query($sql);

if ($resultProductos->num_rows > 0) {
    while ($row = $resultProductos->fetch_assoc()) {
        echo "<div class='producto'>";
        echo "<img src='" . $row["Imagen"] . "' alt='" . $row["Nombre"] . "'>";
        echo "<div class='detalles-producto'>";
        echo "<h3>" . $row["Nombre"] . "</h3>";
        echo "<p>Stock: " . $row["Stock"] . "</p>";
        echo "<p>Precio: $" . $row["PrecioCliente"] . "</p>";
        echo "<p>Descripción: " . $row["Descripcion"] . "</p>";
        echo "</div>";ughuyb
        echo "</div>";
    }
} else {
    echo "No hay productos disponibles.";
}
?>
