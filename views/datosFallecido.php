<form action="index.php" method="get">
    <div>
    <p>Estado civil</p>
        <input type="radio" id="married" name="civilstatus" value="casado">
        <label for="married">Casado</label><br>
        <input type="radio" id="partner" name="civilstatus" value="pareja de hecho">
        <label for="partner">Pareja de hecho</label><br>
        <input type="radio" id="single" name="civilstatus" value="soltero">
        <label for="single">Soltero</label><br>
        <input type="radio" id="widower" name="civilstatus" value="viudo">
        <label for="widower">Viudo</label><br>
        <input type="radio" id="divorced" name="civilstatus" value="divorciado">
        <label for="divorced">Divorciado</label><br>
    </div>
    <div>
        <p>¿En el momento de la defunción el fallecido tenía un negocio?</p>
        <input type="radio" id="haveYes" name="havebusiness" value="Si">
        <label for="haveYes">Si</label><br>
        <input type="radio" id="haveNo" name="havebusiness" value="No">
        <label for="haveNo">No</label><br>
    </div>
    <button type="submit">Enviar</button>
</form>

    