<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
</head>
<body>
<?php
include_once("conexion.php");
if(isset ($_POST['Submit']) ){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $verificar =$_POST['contrasena'];
    $secretpin = $_POST['secretpin'];


    if(empty($nombre) || empty($apellido) || empty($usuario) || empty($contrasena) || empty($secretpin) ) { 
        if(empty($nombre)) {
            echo "<font color= 'red '> Campo: Doc identidad esta vacio.</font><br/>";
        }
        if(empty($apellido)) {
            echo "<font color= 'red '> Campo: Tipo doc esta vacio.</font><br/>";
        }
        if(empty($usuario)) {
            echo "<font color= 'red '> Campo: Nombres esta vacio.</font><br/>";
        }
        if(empty($contrasena)) {
            echo "<font color= 'red '> Campo: Apellidos esta vacio.</font><br/>";
        }
        if(empty($secretpin)) {
            echo "<font color= 'red '> Campo: Celular esta vacio.</font><br/>";
        }
           echo "<br/><a href='javascript:self.history.back(); '> Volver </a>";
} else { 
    $sql = "INSERT INTO usuario (nombre, apellido , usuario, contrasena, secretpin) 
            VALUES (:nombre, :apellido, :usuario, :contrasena, :secretpin)";
    $query = $dbConn->prepare($sql);
    $query->bindparam (':nombre', $nombre);
    $query->bindparam (':apellido', $apellido);
    $query->bindparam (':usuario', $usuario);
    $query->bindparam (':contrasena', $contrasena);
    $query->bindparam (':secretpin', $secretpin); 
    $query->execute();

    echo "<font color='green'>nueva persona.";
    echo "Cantidad de Registros Agregados : " . $query -> rowCount () . "<br>";
    echo "<br> <a href='adminclientes.php '> Ver los usuarios </a>";
    }
}
?>
</body>
</html>