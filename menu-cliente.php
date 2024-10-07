<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comida</title>
    <link rel="stylesheet" href="./tarjetas.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="./tabla.php">Home</a></li>
            </ul>
        </nav>
    </header>

    <div class="card-container">
        <?php
        $imagenes = [
            "./img/burguer/burguer1.jpg",
            "./img/burguer/burguer2.jpg",
            "./img/burguer/burguer3vegana.jpg",
            "./img/burguer/burguer4chedar.jpg",
            "./img/burguer/burguer5special.jpg",
            "./img/burguer/burguer6rellena.jpg"
        ];

        $titulos = [
            "Hamburguesa Completa",
            "Hamburguesa Clasica",
            "Hamburguesa Vegana",
            "Hamburguesa Cochina",
            "Hamburguesa Special Edition",
            "Empanada-Burguer"
        ];

        $descripciones = [
            "Hamburguesa con chedar, cebolla y salsa.",
            "Hamburguesa clasica, la que le gusta a todo el mundo.",
            "Hamburguesa vegana, para los putos que no le gusta la carne.",
            "Hamburguesa bañada en chedar con bacon y más chedar.",
            "Probala y decinos ;).",
            "Si te gusta la empanada te gusta esta."
        ];

        for ($i = 0; $i < 6; $i++) {
            echo '
            <div class="card">
                <img src="' . $imagenes[$i] . '" alt="Imagen Tarjeta ' . ($i+1) . '">
                <div class="card-content">
                    <h3>' . $titulos[$i] . '</h3>
                    <p>' . $descripciones[$i] . '</p>
                </div>
            </div>';
        }
        ?>
    </div>

    <input type="checkbox" id="cart-toggle" class="cart-toggle-checkbox">
    <label for="cart-toggle" class="cart-icon">
        <img src="./img/carro-de-la-carretilla.png" alt="Carrito de Compras">
    </label>


    <div id="cart-sidebar" class="cart-sidebar">
        <h2>Tu Carrito</h2>
        <ul></ul>
        <label for="cart-toggle" class="close-btn">Cerrar</label>
    </div>

</body>
</html>
