<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" type="text/css" href="./styles.css">
</head>
<body>
    <form action="">
            <p>Estado civil</p>
            <input class="radio-civil" type="radio" id="married" name="civilstatus" value="Casado">
            <label for="married">Casado</label><br>
            <input class="radio-civil" type="radio" id="partner" name="civilstatus" value="Pareja de hecho">
            <label for="partner">Pareja de hecho</label><br>
            <input class="radio-civil" type="radio" id="single" name="civilstatus" value="Soltero">
            <label for="single">Soltero</label>
        </div>
        <div class="married d-none">
            <div>
                <p>Regimen de matrimonio a fecha de fallecimiento</p>
                <input type="radio" id="communityP" name="married" value="Gananciales">
                <label for="married">Gananciales</label><br>
                <input type="radio" id="separationP" name="married" value="Separacion de Bienes">
                <label for="partner">Separacion de Bienes</label>
                <div>
                    <label for="spouseName">Nombre y Apellido:</label>
                    <input type="text" id="spouseName" name="married">
                </div>
            </div>
        </div>
        <button type="submit">Enviar</button>
    </form>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>

