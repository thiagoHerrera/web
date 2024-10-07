<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./stylesTabla.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Luckiest+Guy&display=swap" rel="stylesheet">
    <!-- Menu de usuario -->  
<div class="menu">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Menu
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a href="cerrar-sesion.php"><button type="button" class="btn btn-danger" ><i class="bi bi-x-circle-fill"></i> Cerrar sesion</button></a></li><br>
    <li><a href="form-nuevo-producto.html"><button type="button" class="btn btn-success" ><i class="bi bi-plus-circle-fill"></i> Nuevo Producto</button></a></li>
    <li><a href="tabla.php"><button type="button" class="btn btn-success" ><i class="bi bi-plus-circle-fill"></i> Productos</button></a></li>
    <li><a href="empleado.php"><button type="button" class="btn btn-success" ><i class="bi bi-plus-circle-fill"></i>Empleados</button></a></li>
  </ul>
</div>
    
    <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./img/fondo.jpg" class=" imagenes d-block " alt="...">
      </div>
      <div class="carousel-item ">
        <img src="./img/fondo.jpg" class=" imagenes d-block " alt="...">
      </div>
      <div class="carousel-item ">
        <img src="./img/Web_Photo_Editor.jpg" class=" imagenes d-block " alt="">
      </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
  </div>

    <style>
      .bebas-neue-regular {
        font-family: "Bebas Neue", sans-serif;
        font-weight: 400;
        font-style: normal;
      }
    </style>
    <title>Tabla Productos</title>
</head>
<body class="fondito">

  <h1 class="text-center bebas-neue-regular">Panel de Productos</h1>
<div class="container w-50">

  
  <form class="d-flex" method="GET" action="">
      <input name="search" class="form-control me-2" type="search" placeholder="Buscar producto" aria-label="Buscar producto">
      <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>

  <div class="input-group rounded">
</div>
<table class="table caption-top">
<caption>Lista de Productos</caption>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Comidas</th>
      <th scope="col">Precio</th>
      <th scope="col">Acciones</th>
    </tr>
  </tad>
<tbody class="table-group-divider table-secondary table table-bordered">
<?php
require 'conexion.php';
if(isset($_SESSION['id'])){
  print ("<h1>Bienvenido Gerente, {$_SESSION['nombre']}</h1>");
  // En el caso que el valor de la busqueda esta presente:
  $search = isset($_GET['search']) ? $_GET['search'] : '';

  if ($search) { // Este $search verifica si hay algun valor en la variable especificada
    $query = $cnx->prepare("SELECT * FROM producto WHERE nombre LIKE :search"); // Se hace la consulta la cual desiganara la busqueda en cuestion
    $query->bindValue(':search', "%$search%", PDO::PARAM_STR); // Con el bindvalue se le da un valor a $search
  } else {
    //especificamos la consulta
    $query= $cnx->prepare("SELECT * FROM producto"); // Si no se ingreso nada o no se encuentra el valor, se muestran todos los valores que existen
  }
  
  //execute(orden 66)la orden
  $query->execute();
  //obtiene datos
  $filas= $query->fetchALL(PDO::FETCH_ASSOC);
  //procesa los datos
  foreach($filas as $producto){
      print "<tr>";
        print'<th scope="row">'.$producto['codigo'] .'</th>';
        print"<td>{$producto['nombre']}</td>";
        print"<td>{$producto['precio']}</td>";
        print"<td><a href= 'eliminar.php?codigo={$producto['codigo']}'><i class='bi bi-archive-fill me-2'></i></a>";
        print"<a href= 'modificar.php?codigo={$producto['codigo']}'><i class='bi bi-pencil-square'></i></a></td>";
      print"</tr>";
  }
}else{
  print("debe iniciar sesion");
}
?>
</tbody>
</table>
</div>
</body>
</html>