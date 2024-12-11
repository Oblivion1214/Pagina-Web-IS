<?php
session_start();
include 'config.php';
// Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar los datos recibidos
    $productoID = isset($_POST['productoID']) ? intval($_POST['productoID']) : null;
    $stock = isset($_POST['Stock']) ? intval($_POST['Stock']) : null; // Cambié "Cantidad" a "Stock"

    // Verificar que los campos no estén vacíos
    if ($productoID && $stock) {
        // Iniciar transacción para asegurar la integridad de las operaciones
        $conn->begin_transaction();
        
        try {
            // Preparar la consulta para insertar en la tabla `insertarProducto`
            $stmt = $conn->prepare("INSERT INTO insertarProducto (ProductoID, Stock) VALUES (?, ?)");
            if ($stmt === false) {
                throw new Exception("Error al preparar la consulta de inserción.");
            }

            // Enlazar parámetros y ejecutar la consulta de inserción
            $stmt->bind_param("ii", $productoID, $stock);
            $stmt->execute();
            $stmt->close();

            // Preparar la consulta para actualizar el stock en la tabla `productos`
            $stmtUpdate = $conn->prepare("UPDATE productos SET Stock = Stock + ? WHERE ProductoID = ?");
            if ($stmtUpdate === false) {
                throw new Exception("Error al preparar la consulta de actualización.");
            }

            // Enlazar parámetros y ejecutar la consulta de actualización
            $stmtUpdate->bind_param("ii", $stock, $productoID);
            $stmtUpdate->execute();

            if ($stmtUpdate->affected_rows === 0) {
                throw new Exception("El producto con el ID proporcionado no existe o no se actualizó correctamente.");
            }

            $stmtUpdate->close();

            // Confirmar la transacción
            $conn->commit();

            // Mostrar mensaje de éxito
            echo "Productos actualizados.";

        } catch (Exception $e) {
            // Si ocurre algún error, revertir la transacción
            $conn->rollback();
            echo "Error al insertar o actualizar el producto: " . $e->getMessage();
        }
        
    }
} 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Insertar Stock</h2>
        <form action="insertar_producto.php" method="POST">
            <input type="number" name="productoID" placeholder="ID del producto" required>
            <input type="number" name="cantidad" placeholder="Cantidad" required>
            <button type="submit">Insertar Producto</button>
        </form>

        <!-- Botón para regresar al inicio debajo del formulario -->
        <a href="proveedores.php">
            <button class="return-btn">Volver al inicio</button>
        </a>
    </div>
</body>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .form-container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: 400px;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #5cb85c;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        background-color: #4cae4c;
    }

    .return-btn {
        background-color: #f44336;
        margin-top: 10px;
        width: 100%;
    }

    .return-btn:hover {
        background-color: #e53935;
    }
</style>
</html>
