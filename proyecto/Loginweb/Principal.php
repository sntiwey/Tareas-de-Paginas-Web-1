<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <!-- Importando Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #b3e5fc;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        h1 {
            color: #00796b;
            font-weight: 500;
            text-align: center;
        }
        table {
            margin-top: 20px;
        }
        .no-records {
            color: red;
            font-weight: 500;
        }
        .center-buttons {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php
session_start();
$nombre_gamer_tag = $_SESSION['username'];

//Si el usuario no está iniciando sesión lo redirige al login
if (!isset($_SESSION['logueado'])) {
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
    header('Location: index.php');
    exit();
} else {
    echo "<h1>Hola, tu ID de Call Of Duty Black Ops 6 es: $nombre_gamer_tag</h1>";

    // Se usa el requiere para si se necesita el archivo de conexión
    require "./logica/conexion.php";
    mysqli_set_charset($conexion, 'utf8');

    // Generar el query
    $consulta_sql = "SELECT * FROM cuenta";
    $resultado = $conexion->query($consulta_sql);
    $count = mysqli_num_rows($resultado);

    echo "<table class='highlight centered responsive-table'>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>ID</th>
                <th>Armas desbloqueadas en diamante</th>
                <th>Nivel de cuenta</th>
                <th>Prestigio de cuenta</th>
                <th>Tu contraseña</th>
                <th>Fecha de creación de cuenta</th>
                <th>Roles en Discord</th>
            </tr>
        </thead>
        <tbody>";

    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $row['nombre_cuenta'] . "</td>";
            echo "<td>" . $row['nombre_gamer_tag'] . "</td>";
            echo "<td>" . $row['armas_completas_camos'] . "</td>";
            echo "<td>" . $row['nivel_cuenta'] . "</td>";
            echo "<td>" . $row['prestigio_cuenta'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['fecha_registro'] . "</td>";
            echo "<td>" . $row['permisos'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<h1 class='no-records center-align'>Sin ningún registro</h1>";
    }

    echo "
        <div class='center-align center-buttons'>
            <a href='EliminarUsuario.php' class='btn red lighten-1'>Eliminar Usuario</a>
            <a href='Registro.php' class='btn green lighten-1'>Registro</a>
        </div>
        <div class='center-align center-buttons'>
            <a href='logica/salir.php' class='btn blue lighten-1'>SALIR</a>
        </div>
    ";
}
?>

<!-- Importando Materialize JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
