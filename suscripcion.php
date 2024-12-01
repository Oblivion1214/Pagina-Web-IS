<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metodos de Pago</title>
</head>
<body>

    <div class="container">
        <h1>Metodos de Pago</h1>

        <!-- Tarjeta de Crédito -->
        <div class="payment-method">
            <h2>Tarjeta de Credito</h2>
            <form>
                <label for="cc-name">Nombre en la tarjeta</label>
                <input type="text" id="cc-name" name="cc-name" required>

                <label for="cc-number">Numero de tarjeta</label>
                <input type="number" id="cc-number" name="cc-number" required>

                <label for="cc-expiry">Fecha de vencimiento (MM/AA)</label>
                <input type="text" id="cc-expiry" name="cc-expiry" placeholder="MM/AA" required>

                <label for="cc-cvc">Codigo CVC</label>
                <input type="number" id="cc-cvc" name="cc-cvc" required>

                <button type="submit">Pagar con Tarjeta</button>
            </form>
        </div>

        <div class="payment-method">
            <h2>PayPal</h2>
            <form>
                <label for="paypal-email">Correo Electronico de PayPal</label>
                <input type="email" id="paypal-email" name="paypal-email" required>

                <button type="submit">Pagar con PayPal</button>
            </form>
        </div>
        <div class="payment-method">
            <h2>Pago con oxxo</h2>
            <p>Seleccione esta opcion para pagar con oxxo y generar QR</p>
            <button type="submit">Confirmar Pago</button>
        </div>
    </div>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #333;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 80px;
            background-color: #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 2, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .payment-method {
            margin-bottom: 20px;
        }

        .payment-method h2 {
            color: #444;
            margin-bottom: 10px;
            text-align: center;
        }

        .payment-method label {
            display: block;
            margin-bottom: 10px;
        }

        .payment-method input[type="text"],
        .payment-method input[type="number"],
        .payment-method input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .payment-method button {
            background-color: #28a745;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .payment-method button:hover {
            background-color: #218838;
        }

        .payment-method img {
            max-width: 100px;
            margin-right: 10px;
            vertical-align: middle;
        }
    </style>
</body>
</html>
