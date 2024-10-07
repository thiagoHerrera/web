<?php
    require 'conexion.php';
    $query= $cnx->prepare("
    INSERT INTO producto
        (nombre,precio,imagen)
    VALUES
        (:nombre, :precio, :imagen)");
    $query->bindValue(":nombre", $_POST['nombre']);
    $query->bindValue(":precio", $_POST['precio']);
    $query->bindValue(":imagen", $_POST['imagen']);
    if($query->execute()){
        print "Datos agregados, El codigo es ".$cnx -> lastInsertId();
    } else{
        print "Error en la consulta";
    }
    header('Location: form-nuevo-producto.html')
?>