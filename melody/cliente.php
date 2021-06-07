<?php
include_once("conexion.php");
$result = $dbConn->query("SELECT * FROM usuario");
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>melody</title>
        <link rel="stylesheet" href="estilo.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <title>melody music</title>
        
    </head>

<body>

    <!--ESTA ES LA CABECERA-->
    <header>
    <nav id="header" class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="inicio.php">
            <strong>MELODY MUSIC</strong> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="nosotros.html">Nosotros</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Nuestros instrumentos
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">cuerda</a></li>
                <li><a class="dropdown-item" href="#">Viento</a></li>
                <li><a class="dropdown-item" href="#">Percusión</a></li>
                <li><a class="dropdown-item" href="#">Estudio</a></li>
                <li><a class="dropdown-item" href="#">para niños</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">en stock</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                configuracion
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="cliente.php">crud</a></li>
                <li><a class="dropdown-item" href="#">mi carrito</a></li>
                <li><a class="dropdown-item" href="logout.php">salir</a></li>
              </ul>
          </ul>
        </div>
      </div>
    </nav>

        </div>
    </header>

    

<section class="espaciotop">
<div class="centrarnav"><a href="form_adicionar.html" class="button_slide slide_right">
                    <span id="span1"></span>
                    <span id="span2"></span>
                    <span id="span3"></span>
                    <span id="span4"></span>
                    <span id="span5"></span>
                    Nuevo usuario</a></div><br><br>
    <table class="centrarnav contenido-tabla">
        <thead>
            <tr id="tabla-crud">
                <th>nombre</th>
                <th>apellido</th>
                <th>usuario</th>
                <th>contraseña</th>
                <th>secretpin</th>
               
            </tr>
        </thead>
        <?php
        while ( $row = $result->fetch(PDO::FETCH_ASSOC) ){
            echo "<tbody>";
            echo "<tr>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellido'] . "</td>";
            echo "<td>" . $row['usuario'] . "</td>";
            echo "<td>" . $row['contrasena'] . "</td>";
            echo "<td>" . $row['secretpin'] . "</td>";
          
            echo "<td> <span class='link'> 
            <a href=\"editar.php? usuario = $row[usuario]\"> Editar </a></span> |
             <span class='link'><a href=\"eliminar.php?usuario=$row[usuario]\" 
            onClick=\"return confirm('¿Está seguro de eliminar este registro?') \">Eliminar</a></span></td>";
    }
    ?>
  </table>
</section>
    


        <p class="espaciobot"></p>

        <footer id="footer" class="pb-4 pt-4">
      <div class="container">
        <div class="row text-center">
          <div class="col-12 col-lg">
            <a href="#"><strong>Preguntas frecuentes</strong></a>
          </div>
          <div class="col-12 col-lg">
            <a href="#"><strong>Contactanos</strong></a>
          </div>
          <div class="col-12 col-lg">
            <a href="#"><strong>Otros productos</strong></a>
          </div>
        </div>
      </div>
    </footer>
  
</body>

</html>