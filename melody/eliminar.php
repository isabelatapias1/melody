<?php
include_once("conexion.php");
$Doc_identidad = $_GET ['usuario'];
$sql = "DELETE FROM usuario WHERE usuario = :usuario";
$query = $dbConn->prepare ($sql);
$query->execute(array(':usuario' => $usuario)); 
header("Location: cliente.php");
?>