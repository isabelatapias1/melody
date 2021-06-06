<?php
include_once("../../conexion.php");
if(isset ($_POST['update']) ) 
{
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $secretpin = $_POST['secretpin'];

    
    if(empty($nombre) || empty($apellido) || empty($usuario) || empty($contrasena) || empty($secretpin) ) { 
        if(empty($nombre)) {
            echo "<font color= 'red '>Campo: Doc identidad esta vacio.</font><br/>";
        }
        if(empty($apellido)) {
            echo "<font color= 'red '>Campo vacio.</font><br/>";
        }
        if(empty($usuario)) {
            echo "<font color= 'red '>Campo vacio.</font><br/>";
        }
        if(empty($contrasena)) {
            echo "<font color= 'red '>Campo  vacio.</font><br/>";
        }
        if(empty($secretpin)) {
            echo "<font color= 'red '>Campo vacio.</font><br/>";
        }
} else {
    $sql = "UPDATE usuario SET nombre=:nombre, apellido=:apellido, usuario=:usuario, contrasena=:contrasena, 
            secretpin=:secretpin  WHERE usuario=:usuario";

    $query = $dbConn->prepare($sql);
    $query->bindparam (':nombre', $nombre);
    $query->bindparam (':apellido', $apellido);
    $query->bindparam (':usuario', $usuario);
    $query->bindparam (':contrasena', $contrasena);
    $query->bindparam (':secretpin', $Tel_contacto);
    $query->execute();
    header("Location: clientes.php");
    }
}
?>
<?php
$usuario = $_GET['usuario'];
$sql = "SELECT *  FROM usuario WHERE usuario=:usuario";
$query = $dbConn->prepare($sql);
$query->execute (array (':usuario' => $usuario));
while($row = $query->fetch(PDO::FETCH_ASSOC) )
{
    $nombre = $row ['nombre'];
    $apellido = $row ['apellido'];
    $usuario = $row ['usuario'];
    $contrasena = $row ['contrasena'];
    $secretpin = $row ['secretpin'];
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    
    <div class="content">
        <div class="contact-wrapper">
            <div class="contact-form">
                <form name="forml" method= "post" action="editar.php">
                    <p>
                        <label>Nombre</label>
                        <input type="text" name="nombre" value="<?php echo $nombre;?>" disabled>
                    </p>
                    <p>
                        <label>Apellido</label>
                        <input type="text" name="apellido" value="<?php echo $apellido;?>">
                    </p>
                    <p>
                        <label>Usuario</label>
                        <input type="text" name="usuario" value="<?php echo $usuario;?>">
                    </p>
                    <p>
                        <label>Contraseña</label>
                        <input type="text" name="contrasena" value="<?php echo $contrasena;?>">
                    </p>
                    <p>
                        <label>Secretpin</label>
                        <input type="text" name="secretpin" value="<?php echo $secretpin;?>">
                    </p>
                    <p class="block">
                        <button>
                            <input type="hidden" name="usuario" value=<?php echo $_GET['usuario'];?>>
                            <input type="submit" name="update" value="Editar">
                        </button>
                    </p>
                    
                </form>
            </div>
        </div>

    </div>

</body>
</html>
