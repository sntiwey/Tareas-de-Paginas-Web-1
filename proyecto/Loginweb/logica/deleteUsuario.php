<?php
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
$registroEliminado =$_POST['nombre_gamer_tag'];
$consulta="DELETE FROM cuenta WHERE nombre_gamer_tag = '$registroEliminado'";

mysqli_query($conexion, $consulta);
mysqli_close($conexion);
header('Location: ../EliminarUsuario.php');
?>
