<form action="views/procesador.php" method="post">
    <div>
    <p>Estado civil</p>
        <input class="radio-civil" type="radio" id="married" name="civilstatus" value="Casado">
        <label for="married">Casado</label><br>
        <input class="radio-civil" type="radio" id="partner" name="civilstatus" value="Pareja de hecho">
        <label for="partner">Pareja de hecho</label><br>
        <input class="radio-civil" type="radio" id="single" name="civilstatus" value="Soltero">
        <label for="single">Soltero</label><br>
        <input class="radio-civil" type="radio" id="widower" name="civilstatus" value="Viudo">
        <label for="widower">Viudo</label><br>
        <input class="radio-civil" type="radio" id="divorced" name="civilstatus" value="Divorciado">
        <label for="divorced">Divorciado</label><br>
    </div>
    <div>
        <input type="number" name="patrimonio">
        <label>Patrimonio</label>
    </div>
    <button type="submit">Enviar</button>
</form>

    