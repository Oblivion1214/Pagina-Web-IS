<?php
session_start();
include 'config.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM productos WHERE ProductoID = $id";
    $resultProducto = $conn->query($sql);

    if ($resultProducto->num_rows > 0) {
        $producto = $resultProducto->fetch_assoc();

        $productoItem = [
            'id' => $producto['ProductoID'],
            'nombre' => $producto['Nombre'],
            'precio' => $producto['PrecioCliente'],
            'cantidad' => 1
        ];

        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        $carrito = $_SESSION['carrito'];

        $found = false;
        foreach ($carrito as &$item) {
            if ($item['id'] == $id) {
                $item['cantidad']++;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $carrito[] = $productoItem;
        }

        $_SESSION['carrito'] = $carrito;

        echo "Producto añadido satisfactoriamente";
    } else {
        echo "Producto no encontrado";
    }
} else {
    echo "ID de producto no especificado";
}
?>
