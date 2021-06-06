<?php
require 'config.php';
if(empty($_SESSION['nombre']))
header('location: login.php');

if(iseet($_POST['update'])) {
    $errMsg = '';

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $verificar =$_POST[$contrasena]
    $secretpin = $_POST['secretpin'];

    if($contrasena !=$verificar)
    $errMsg ='error en la contrasena.';

    if($errMsg == '') {
        try {
            $sql = "UPDATE usuario SET nombre = :nombre, apellido = :apellido , usuario = :usuario, contrasena = :contrasena , secretpin = :secretpin WHERE usuario = :usuario";
            $stmt = $connect -> prepare($sql);
            $stmt->execute(array(
                ':nombre'=> $nombre,
                ':apellido'=> $apellido,
                ':usuario'=> $usuario,
                ':contrasena'=> $contrasena,
                ':secretpin'=> $secretpin,
            ));
            header('location: update.php?action=updated');
            exit;

        }
        catch(PDOException $e){
            $errMsg = $e->getMessage();
        }
    }

}
if(isset($_GET['action'])&&$_GET['action'] == 'updated')
$errMsg = 'Datos actualizados correctamente.<a href="logout.php">salga</a> e ingrese de nuevo.';

?>
<html>
    <head>
        <title>Actualizar</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <div style="margin:15px">
    <div align="center">
        <div style="border: solid 1px #079B96;" align ="center">
        <div style="background-color:#006D9C; color:#FFFFFF padding:10px;">
        <b><?php echo $_SESSION['nombre']?></b>
</div>
<div style = "margin:15px">
<form action="" method="post">
    nombre completo
    <input type="text" name="nombre" value="<?php echo $_SESSION['nombre'];?>" autocomplete="off"
    class="box"/>
    apellido
    <input type="text" name="apellido" value="<?php echo $_SESSION['apellido'];?>"  autocomplete="off"
    class="box"/>
    usuario
    <input type="text" name="usuario" value="<?php echo $_SESSION['usuario'];?>" disable autocomplete="off"
    class="box"/>
    secretpin
    <input type="text" name="secretpin" value="<?php echo $_SESSION['secretpin'];?>" disable autocomplete="off"
    class="box"/>
    <hr>
    contrasena
    <input type="password" name="contrasena" value=<?php echo $_SESSION['contrasena'];?> autocomplete="off"
    class="box"/>
    validar contrasena
    <input type="password" name="verficar" value="<?php echo $_SESSION['contrasena'];?>" disable autocomplete="off"
    class="box"/>
    usuario
    <input type="submit" name="update" value="actualizar" class='submit' /><br/>
    <?php 
    if(isset($errMsg)){
        echo'<div style="color:#FF0000;text-align:center;font-size:17px;">'.errMsg.'</div>';

    }
    ?>
    </form>
</div>
</div>
</div>
</div>
</body>
</html>
