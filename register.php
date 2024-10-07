<?php
    require 'conexion.php';
    $query= $cnx->prepare("
    INSERT INTO usuario
        (nombre,apellido,password)
    VALUES
        (:nombre,:apellido,:password)");
    $query->bindValue(":nombre", $_GET['nombre']);
    $query->bindValue(":apellido", $_GET['apellido']);
    $query->bindValue(":password", $_GET['password']);
    if($query->execute()){
        print "Datos agregados, El codigo es ".$cnx -> lastInsertId();
    } else{
        print "aaaa";
    }
    header('Location: form-login.html')
?>
