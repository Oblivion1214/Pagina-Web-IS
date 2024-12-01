<?php
include 'config.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Electrodomésticos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="menu-toggle" id="mobile-menu">
            ☰ Menú
        </div>
        <nav class="navbar">
            <ul class="menu">
                <li><a href="inicio.php">Inicio</a></li>
                <li><a href="productos.php">Productos</a></li>
                <li><a href="clientes.php">Clientes</a></li>
                <li><a href="proveedores.php">Proveedores</a></li>
                <li><a href="editar_datos.php">Editar datos</a></li>
                <li><a href="login.php">Mi cuenta (Cerrar sesión)</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Bienvenido a nuestra tienda de Electronica</h1>
                <p>Encuentra los mejores electronicos para tus necesidades.</p>
                <a href="productos.php" class="btn">Ver productos</a>
            </div>
        </section>

        <section class="about">
            <div class="about-content">
                <h2>Sobre nosotros</h2>
                <p>Somos una tienda especializada en la venta de Electronica de alta calidad. Ofrecemos una amplia gama de productos para todas tus necesidades.</p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Tienda de electronicos. Todos los derechos reservados.</p>
    </footer>
</body>
<style>
    /* Estilos generales */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    line-height: 1.6;
    background-color: #f0f0f0;
}

.container {
    width: 80%;
    margin: auto;
    overflow: hidden;
}

/* Estilos del encabezado */

header {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
    position: relative;
}

.menu-toggle {
    display: none;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.menu {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.menu li {
    margin-right: 20px;
}

.menu li:last-child {
    margin-right: 0;
}

.menu a {
    text-decoration: none;
    color: #fff;
    padding: 10px;
    transition: background-color 0.3s ease;
}

.menu a:hover {
    background-color: #555;
    border-radius: 4px;
}

/* Estilos del contenido principal */

.hero {
    background-image: url('imagenes/productos.avif');
    background-size: cover;
    background-position: center;
    height: 500px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #fff;
}

.hero-content {
    max-width: 600px;
    margin: auto;
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 8px;
}

.hero-content h1 {
    font-size: 2.5em;
    margin-bottom: 10px;
}

.hero-content p {
    font-size: 1.2em;
    margin-bottom: 20px;
}

.btn {
    display: inline-block;
    background-color: #f39c12;
    color: #fff;
    padding: 10px 20px;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #e67e22;
}

/* Estilos del pie de página */

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    position: absolute;
    bottom: 0;
    width: 100%;
}

footer p {
    margin: 0;
}
h2{
    text-align: center;
}
p{
    text-align: center;
}
/* Media queries para responsive */

@media (max-width: 768px) {
    .menu-toggle {
        display: block;
        padding: 10px 20px;
        color: #fff;
        font-size: 1.2em;
        cursor: pointer;
    }

    .menu {
        display: none;
        flex-direction: column;
        position: absolute;
        top: 60px;
        left: 0;
        width: 100%;
        background-color: #333;
        z-index: 99;
    }

    .menu.active {
        display: flex;
    }

    .menu li {
        text-align: center;
        margin: 10px 0;
    }

    .menu a {
        padding: 10px 0;
        display: block;
    }
}

</style>
</html>
