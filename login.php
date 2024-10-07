<?php
session_start();
require 'conexion.php';
$query = $cnx->prepare("SELECT  * FROM  usuario WHERE nombre = :nombre AND apellido = :apellido AND password = :password");
$query->bindValue(":nombre",$_GET['nombre']);
$query->bindValue(":apellido",$_GET['apellido']);
$query->bindValue(":password",$_GET['password']);

$query->execute();
if($query->rowCount() == 1){
    $usuario=$query->fetch(PDO::FETCH_ASSOC);
    $_SESSION['id'] = $usuario['id'];
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['apellido'] = $usuario['apellido'];
    

    print("Sesion Iniciada");
    var_export($_SESSION);
    header('Location: tabla.php');
}else{
    header('Location: form-login.html');
}
?>