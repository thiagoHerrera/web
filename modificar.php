<?php
    require 'conexion.php';
    $codigo = $_GET['codigo'];
    //1. Especificamos la consulta
    $query = $cnx->prepare("SELECT * FROM producto WHERE codigo = :codigo");
    $query->bindValue(":codigo",$codigo );
    // 2. Ejecutamos la consulta y la enviamos a MySQL
    $query->execute();
    //3. Obtenemos los datos
    $producto = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./stylesTabla.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <title>Modificar</title>
</head>
<body class="fondito">
    <h1 class="display-5 text-center">Modificar Producto</h1>
    <div class="container text-center">   
        <form class="mx-auto" action="./form-modificar.php" method="POST"> 
                <input type="hidden" name="codigo" value="<?php print $producto['codigo']?>">
                Nombre: <input class="form-control w-25 mx-auto" type="text" name="nombre" value="<?php print $producto['nombre']?>"><br>
                Precio: <input class="form-control w-25 mx-auto"type="number" name="precio" value="<?php print $producto['precio']?>"><br>
                <input class="btn btn-primary" type="submit" value="Modificar">
        </form>
        <a href="tabla.php" class="btn btn-primary mt-1">Ver la tabla actualizada</a>
    </div>
</body>
</html>
