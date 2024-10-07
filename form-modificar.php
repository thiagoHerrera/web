<?php
    require 'conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    //1. Especificamos la consulta
    $query = $cnx->prepare('UPDATE producto SET nombre =:nombre, precio =:precio WHERE codigo = :codigo');
    $query->bindValue(":codigo",$codigo );
    $query->bindValue(":nombre",$nombre );
    $query->bindValue(":precio",$precio );
    // 2. Ejecutamos la consulta y la enviamos a MySQL
    $query->execute();
    //3. Redirige a la pagina principal
    header('Location: tabla.php')
?>