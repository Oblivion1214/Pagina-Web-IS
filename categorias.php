<?php
include 'config.php';

$sql = "SELECT * FROM CATEGORIAS";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Categorías</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Listado de Categorías</h1>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='categoria'>";
            echo "<h2>" . $row["Nombre"] . "</h2>";
            echo "<p>Descripción: " . $row["Descripcion"] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No hay categorías disponibles.";
    }

    $conn->close();
    ?>
</body>
</html>
