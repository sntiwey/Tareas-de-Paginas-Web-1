<?php
session_start();

// Si el usuario no está iniciando sesión lo redirige al login
if (!isset($_SESSION['logueado'])) {
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
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
            display: flex;
            flex-direction: column;
            align-items: center;
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
        form {
            margin-top: 50px;
            background-color: #80deea;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        input {
            margin-bottom: 20px;
        }
        button {
            background-color: #00796b;
            color: white;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #004d40;
        }
        .center-buttons {
            margin-top: 20px;
            text-align: center;
        }
        a {
            color: #00796b;
            font-weight: 500;
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

<main>
    <h1>Eliminar usuario permanentemente</h1>

    <form method="POST" action="./logica/deleteUsuario.php">
        <input type="text" name="nombre_gamer_tag" placeholder="ID" required maxlength="100" />
        <br />
        <button type="submit">Eliminar cuenta</button>
    </form>

    <div class="center-buttons">
        <a href="Principal.php" class="btn waves-effect waves-light">Regresar a la tabla de registros</a>
    </div>
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

<!-- Importando Materialize JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
