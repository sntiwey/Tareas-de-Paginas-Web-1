<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #b3e5fc;
            font-family: 'Roboto', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-box {
            background-color: #448aff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h1 {
            color: black;
            font-weight: 500;
        }
        button {
            background-color: #4db6ac;
            color: white;
        }
        input[type="text"], input[type="password"] {
            border: 1px solid #4db6ac;
            border-radius: 5px;
            padding: 5px;
        }
        .register-link {
            margin-top: 20px;
            color: white;
            font-size: 14px;
        }
        .register-link a {
            color: #ffab40;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>Inicia sesión para poder ingresar</h1>
        <form method="POST" action="logica/loguear.php">
            <input type="text" name="nombre_gamer_tag" placeholder="Nombre ID" required />
            <br /><br />
            <input type="password" name="clave" placeholder="Contraseña" required />
            <br /><br />
            <button type="submit" class="btn waves-effect waves-light">Iniciar Sesión</button>
        </form>
        <div class="register-link">
            ¿No estás registrado? <a href="registro.php">Haz clic aquí para registrarte</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
