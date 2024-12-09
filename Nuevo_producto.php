<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar los datos recibidos
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : null;
    $imagen = isset($_POST['imagen']) ? trim($_POST['imagen']) : null;
    $stock = isset($_POST['stock']) ? intval($_POST['stock']) : null;
    $precioProveedor = isset($_POST['precio_proveedor']) ? floatval($_POST['precio_proveedor']) : null;
    $precioCliente = isset($_POST['precio_cliente']) ? floatval($_POST['precio_cliente']) : null;
    $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : null;
    $proveedorID = isset($_POST['proveedorID']) ? intval($_POST['proveedorID']) : null;
    $categoriaID = isset($_POST['categoriaID']) ? intval($_POST['categoriaID']) : null;

    // Verificar que los campos no estén vacíos
    if ($nombre && $imagen && $stock !== null && $precioProveedor !== null && $precioCliente !== null && $descripcion && $proveedorID && $categoriaID) {
        // Iniciar transacción para asegurar integridad
        $conn->begin_transaction();

        try {
            // Comprobar si el producto ya existe
            $stmtCheck = $conn->prepare("SELECT ProductoID FROM productos WHERE Nombre = ?");
            $stmtCheck->bind_param("s", $nombre);
            $stmtCheck->execute();
            $result = $stmtCheck->get_result();

            if ($result->num_rows > 0) {
                // Si existe, actualizar el stock
                $producto = $result->fetch_assoc();
                $productoID = $producto['ProductoID'];

                $stmtUpdate = $conn->prepare("UPDATE productos SET Stock = Stock + ? WHERE ProductoID = ?");
                $stmtUpdate->bind_param("ii", $stock, $productoID);
                $stmtUpdate->execute();

                if ($stmtUpdate->affected_rows === 0) {
                    throw new Exception("Error al actualizar el producto.");
                }

                echo "Producto existente actualizado con éxito.";
                $stmtUpdate->close();
            } else {
                // Si no existe, insertar un nuevo producto
                $stmtInsert = $conn->prepare("INSERT INTO productos (Nombre, Imagen, Stock, PrecioProveedor, PrecioCliente, Descripcion, ProveedorID, CategoriaID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmtInsert->bind_param("ssiddsii", $nombre, $imagen, $stock, $precioProveedor, $precioCliente, $descripcion, $proveedorID, $categoriaID);
                $stmtInsert->execute();

                if ($stmtInsert->affected_rows === 0) {
                    throw new Exception("Error al insertar el producto.");
                }

                echo "Producto nuevo agregado con éxito.";
                $stmtInsert->close();
            }

            $stmtCheck->close();
            $conn->commit();
        } catch (Exception $e) {
            $conn->rollback();
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar o Actualizar Producto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Agregar o Actualizar Producto</h2>
        <form action="Nuevo_producto.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre del Producto" required>
            <input type="text" name="imagen" placeholder="URL de la Imagen" required>
            <input type="number" name="stock" placeholder="Stock" required>
            <input type="number" step="0.01" name="precio_proveedor" placeholder="Precio del Proveedor" required>
            <input type="number" step="0.01" name="precio_cliente" placeholder="Precio al Cliente" required>
            <textarea name="descripcion" placeholder="Descripción" required></textarea>
            <input type="number" name="proveedorID" placeholder="ID del Proveedor" required>
            <input type="number" name="categoriaID" placeholder="ID de la Categoría" required>
            <button type="submit">Guardar Producto</button>
        </form>
    </div>
</body>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
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
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 400px;
}

h2 {
    text-align: center;
    color: #333;
}

form input, form textarea, form button {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}

form button {
    background-color: #28a745;
    color: #fff;
    border: none;
    cursor: pointer;
    font-size: 16px;
}

form button:hover {
    background-color: #218838;
}

</style>
</html>

