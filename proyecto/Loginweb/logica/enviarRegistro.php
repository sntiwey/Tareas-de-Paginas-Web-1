<!-- //Redirigir para iniciar sesión -->
<?php
include "./conexion.php";
mysqli_set_charset($conexion, 'utf8');
$nombreUser = $_POST['nombre_gamer_tag']; // Utilizamos 'nombre_gamer_tag' como identificador

$buscarusuario = "SELECT * FROM cuenta WHERE nombre_gamer_tag ='$nombreUser'"; // Revisamos por 'nombre_gamer_tag'

$resultado = $conexion->query($buscarusuario);
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
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #b3e5fc;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        main {
            flex: 1;
        }
        header {
            width: 100%;
            background-color: #00796b;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        footer {
            width: 100%;
            background-color: #00796b;
            color: white;
            padding: 10px 0;
            text-align: center;
            margin-top: auto;
        }
        .footer-links a {
            color: #ffcc80;
            text-decoration: none;
            margin: 0 10px;
        }
        .card-panel {
            background-color: #80b3ff;
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
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
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <span id="fecha-hora"></span>
            </div>
        </div>
    </div>
</header>

<main class="container">
    <h2 class="center-align white-text">Registro de Usuario</h2>

    <?php
    if ($count == 1) {
        // Si el usuario ya existe, muestra un mensaje con Materialize
        echo "<div class='card-panel red lighten-2 center-content'>
                <span class='white-text'><h4>El usuario ya está registrado</h4></span>
                <a href='../Registro.php' class='btn waves-effect waves-light blue lighten-1'>Intentar registrar nuevamente</a>
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

        // Mensaje de éxito con Materialize
        echo "<div class='card-panel green lighten-1 center-content'>
                <span class='white-text'><h4>Usuario creado con éxito</h4></span>
                <div class='button-container'>
                    <a href='../Registro.php' class='btn waves-effect waves-light blue'>Nuevo registro</a>
                    <a href='../Principal.php' class='btn waves-effect waves-light blue'>Ver registros</a>
                </div>
              </div>";
    }
    ?>
</main>

<footer>
    <p>Call of Duty Black Ops 6 es un juego de disparos en primera persona centrado en operaciones encubiertas con un enfoque futurista y una narrativa intrigante.</p>
    <div class="footer-links">
        <a href="https://www.instagram.com/santisan.ds/" target="_blank">Instagram</a>
        <a href="https://x.com/zD0ki" target="_blank">Twitter</a>
        <a href="https://www.twitch.tv/dookih" target="_blank">Twitch</a>
    </div>
</footer>

<script>
    function actualizarHora() {
        const ahora = new Date();
        const opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('fecha-hora').textContent = 
            ahora.toLocaleString('es-ES', opciones) + " " + ahora.toLocaleTimeString('es-ES');
    }
    setInterval(actualizarHora, 1000);
    actualizarHora();
</script>

<!-- Inicializando Materialize JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
