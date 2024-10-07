<?php
    require 'conexion.php';
    $codigo = $_GET['codigo'];

    $query = $cnx->prepare("DELETE FROM producto WHERE codigo = :codigo");
    $query->bindValue(":codigo", $codigo);
    $query->execute();
    print "Se eliminaron".$query->rowCount();
    header('Location: tabla.php')
    
?>

