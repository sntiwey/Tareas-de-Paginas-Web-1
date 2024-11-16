<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar nuevo usuario</title>
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
        header h3 {
            color: #00796b;
            font-weight: 500;
            text-align: center;
            margin-top: 30px;
        }
        .form-container {
            width: 90%;
            max-width: 500px;
            margin-top: 20px;
            background-color: #e3f2fd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .center-buttons {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <h3>Registro para ver estadísticas de amigos</h3>
</header>

<div class="form-container">
    <form action="./logica/enviarRegistro.php" method="post">
        <div class="input-field">
            <label for="nombre_cuenta">Ingresa nombre usuario:</label>
            <input type="text" name="nombre_cuenta" required maxlength="100" placeholder="Usuario">
        </div>
        
        <div class="input-field">
            <label for="categoria_arma_favorita">¿Cuál es tu categoría de armas favorita dentro de BO6?:</label>
            <input type="text" name="categoria_arma_favorita" required maxlength="100" placeholder="Ingresa tu Categoría">
        </div>
        
        <div class="input-field">
            <label for="prestigio_cuenta">Prestigio de cuenta:</label>
            <input type="text" name="prestigio_cuenta" required maxlength="100" placeholder="Ingresa tu Prestigio actual">
        </div>
        
        <div class="input-field">
            <label for="nombre_gamer_tag">ID dentro del juego:</label>
            <input type="text" name="nombre_gamer_tag" required maxlength="100" placeholder="Ingresa tu ID">
        </div>
        
        <div class="input-field">
            <label for="armas_completas_camos">Armas completas en diamante:</label>
            <input type="text" name="armas_completas_camos" required maxlength="100" placeholder="Número de armas completadas">
        </div>
        
        <div class="input-field">
            <label for="nivel_cuenta">Nivel de cuenta:</label>
            <input type="text" name="nivel_cuenta" required maxlength="8" placeholder="Nivel de cuenta">
        </div>
        
        <div class="input-field">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required maxlength="8" placeholder="Contraseña">
        </div>

        <button type="submit" name="submit" class="btn waves-effect waves-light blue lighten-1">Enviar registro</button>
    </form>
</div>

<div class="center-buttons">
    <a href='./Registro.php' class='btn green lighten-1'>Nuevo registro</a>
    <a href='./Principal.php' class='btn blue lighten-1'>Ver registro</a>
</div>

<!-- Importando Materialize JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
