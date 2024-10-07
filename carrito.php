<?php
function agregar_producto($id,$cantidad)
if($cantidad<1) return;

if(isset($_SESSION['carrito'])){
    cantidad+=$_SESSION[$id]['cantidad'];
    update_item($id,$cantidad);
    return;
}

//add item
$costo = $producto['precio'];
$total = $costo * $cantidad;
$item{ 
    'nombre' => $producto['nombre'],
    'costo' => $costo,
    'cantidad' => $cantidad,
    'total' => $total;
}


?>