<!-- //Redirigir para iniciar sesión -->
<?php

include "./conexion.php";
mysqli_set_charset($conexion,'utf8');
$nombreUser = $_POST['nombre_gamer_tag']; // Utilizamos 'nombre_gamer_tag' como identificador

$buscarusuario = "SELECT * FROM cuenta WHERE nombre_gamer_tag ='$nombreUser'"; // Revisamos por 'nombre_gamer_tag'

$resultado = $conexion -> query($buscarusuario);
$count = mysqli_num_rows($resultado);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Importando Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <style>
        /* Fondo azul pastel oscuro para el recuadro */
        .card-panel {
            background-color: #80b3ff; /* Azul pastel oscuro */
        }
        .center-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 0 20px;
        }
        .btn-spacing {
            margin: 0 10px; /* Aproximadamente 0.5 cm de separación (ajustable) */
        }
    </style>
</head>
<body class="light-blue lighten-3">
    <div class="container">
        <h2 class="center-align white-text">Registro de Usuario</h2>

        <?php
        if ($count == 1) {
            // Si el usuario ya existe, muestra un mensaje con Materialize
            echo "<div class='card-panel center-content'>
                    <span class='white-text'><h4>El usuario ya está registrado</h4></span>
                    <a href='../Registro.php' class='btn waves-effect waves-light red lighten-2'>Intentar registrar nuevamente</a>
                  </div>";
        } else {
            // Si el usuario no existe, insertamos el nuevo usuario
            mysqli_query($conexion, "INSERT INTO cuenta(
                nombre_cuenta, categoria_arma_favorita, nombre_gamer_tag, armas_completas_camos, nivel_cuenta, prestigio_cuenta, password
            ) VALUES (
                '$_POST[nombre_cuenta]',
                '$_POST[categoria_arma_favorita]',
                '$_POST[nombre_gamer_tag]',
                '$_POST[armas_completas_camos]',
                '$_POST[nivel_cuenta]',
                '$_POST[prestigio_cuenta]',
                '$_POST[password]'
            )");

            // Mensaje de éxito con Materialize y botones alineados con una separación de 0.5 cm
            echo "<div class='card-panel green lighten-1 center-content'>
                    <span class='white-text'><h4>Usuario creado con éxito</h4></span>
                    <div class='button-container'>
                        <a href='../Registro.php' class='btn waves-effect waves-light blue btn-spacing'>Puedes generar un Nuevo registro</a>
                        <a href='../Principal.php' class='btn waves-effect waves-light blue btn-spacing'>Ver registros</a>
                    </div>
                  </div>";
        }
        ?>

    </div>

    <!-- Inicializando Materialize JS -->
    <script>
        M.AutoInit();
    </script>
</body>
</html>
