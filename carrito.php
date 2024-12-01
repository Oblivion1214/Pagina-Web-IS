<?php
session_start();

if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    $productId = $_POST['id'];
    if (isset($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $key => $item) {
            if ($item['id'] == $productId) {
                unset($_SESSION['carrito'][$key]);
                $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar el array
                break;
            }
        }
    }
    echo "Producto eliminado";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #333;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .conta {
            text-align: center;
        }

        h1 {
            text-align: center;
            color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-btn {
            background-color: #ff4d4d;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
        }

        .delete-btn:hover {
            background-color: #ff1a1a;
        }

        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 18px;
            text-align: center;
        }
        div{
            text-align: center;
        }
        .button {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
            text-align: center;
            display: block;
            margin: 20px auto 0;
            text-decoration: none; /* Eliminar subrayado de enlace */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Carrito de Compras</h1>
        <div class="conta">
            <img src="imagenes/logo.png" alt="">
        </div>
        <table id="cartTable">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
                <th>Eliminar</th>
            </tr>
            <?php
            if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
                foreach ($_SESSION['carrito'] as $item) {
                    echo "<tr data-id='{$item['id']}'>
                        <td>{$item['nombre']}</td>
                        <td>{$item['cantidad']}</td>
                        <td>\${$item['precio']}</td>
                        <td>\$" . ($item['precio'] * $item['cantidad']) . "</td>
                        <td><button class='delete-btn' onclick='deleteRow(this)'>Eliminar</button></td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>El carrito está vacío</td></tr>";
            }
            ?>
        </table>
        <div class="total" id="totalAmount">Total: $0.00</div>
        <div>
            <a href="productos.php" class="button">Regresar</a>
        </div>
    </div>
    <script>
        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            var productId = row.getAttribute('data-id');
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    row.parentNode.removeChild(row);
                    updateTotal();
                }
            };
            xhttp.open("POST", "carrito.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("action=delete&id=" + productId);
        }

        function updateTotal() {
            var table = document.getElementById("cartTable");
            var rows = table.rows;
            var total = 0;

            for (var i = 1; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName("td");
                if (cells.length > 1) {
                    var subtotal = parseFloat(cells[3].innerText.replace('$', ''));
                    total += subtotal;
                }
            }

            document.getElementById("totalAmount").innerText = "Total: $" + total.toFixed(2);
        }

        window.onload = function() {
            updateTotal();
        }
    </script>
</body>
</html>
