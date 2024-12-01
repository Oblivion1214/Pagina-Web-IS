<?php
include 'config.php';

$sql = "SELECT * FROM CLIENTES";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Listado de Clientes</h1>

        <div class="clientes-lista">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='cliente'>";
                    echo "<h2>" . $row["Nombre"] . " " . $row["ApellidoPaterno"] . " " . $row["ApellidoMaterno"] . "</h2>";
                    echo "<p>Teléfono: " . $row["Telefono"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay clientes disponibles.</p>";
            }

            $conn->close();
            ?>
        </div>
        <a href="inicio.php" onclick="Inicio()" class="button">Inicio</a>
    </div>
</body>

    <style>
        body {
        font-family: Arial, sans-serif;
        background-color: #333;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
    a {
        background-color: #fff; 
        color: #444; 
        padding: 10px 20px;
        border: 1px solid #333; 
        border-radius: 4px;
        cursor: pointer;
        font-size: 1em;
        transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        text-align: center;
        display: block;
        margin: 0 auto;
    }

    a:hover {
        background-color: #333; 
        color: #fff; 
        border-color: #333; 
    }

    h1 {
        text-align: center;
        color: #333;
    }

    .clientes-lista {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    .cliente {
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }

    .cliente:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .cliente h2 {
        margin: 0;
        font-size: 1.2em;
        color: #444;
    }

    .cliente p {
        margin: 10px 0 0;
        color: #666;
    }

    </style>
</html>

