<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $precioFiltro = $_POST['precio'];

    $sqlFiltro = "SELECT * FROM PRODUCTOS WHERE PrecioCliente <= ?";
    $stmt = $conn->prepare($sqlFiltro);
    $stmt->bind_param("d", $precioFiltro);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            echo "<div class='producto'>";
                echo "<img src='" . $row["Imagen"] . "' alt='" . $row["Nombre"] . "'>";
                echo "<div class='detalles-producto'>";
                echo "<h3>" . $row["Nombre"] . "</h3>";
                echo "<p>Stock: " . $row["Stock"] . "</p>";
                echo "<p>Precio: $" . $row["PrecioCliente"] . "</p>";
                echo "<p>Descripción: " . $row["Descripcion"] . "</p>";
                echo "</div>";
                echo "</div>";
        }
    } else {
        echo "No hay productos disponibles por debajo de ese precio.";
    }
}
?>
