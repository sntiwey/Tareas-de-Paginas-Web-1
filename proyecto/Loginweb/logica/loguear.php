<?php
require 'conexion.php';
session_start();

$nombre_gamer_tag = $_POST['nombre_gamer_tag'];
$clave = $_POST['clave'];

// Consulta para verificar las credenciales del usuario
$q = "SELECT COUNT(*) as contar FROM cuenta WHERE nombre_gamer_tag= '$nombre_gamer_tag' AND password = '$clave'";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

if ($array['contar'] > 0) {
    // Guarda el número de cuenta en la sesión
    $_SESSION['username'] = $nombre_gamer_tag;
    $_SESSION['logueado'] = true; // Marca al usuario como logueado

    // Verifica si existe la variable 'redirect_to' en la sesión
    if (isset($_SESSION['redirect_to'])) {
        $redirect_to = $_SESSION['redirect_to'];
        unset($_SESSION['redirect_to']); // Elimina la variable para evitar futuras redirecciones
        header("Location: $redirect_to"); // Redirige a la página deseada
    } else {
        header("Location: ../Principal.php"); // Redirige a la página predeterminada
    }
} else {
    header("Location: ../indexError.php"); // Redirige al login en caso de error
}
exit(); // Finaliza el script para asegurar la redirección
?>