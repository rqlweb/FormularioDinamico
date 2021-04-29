<form action="index.php" method="get">
    <div>
    <p>Estado civil</p>
        <input class="radio-civil" type="radio" id="married" name="civilstatus" value="casado">
        <label for="married">Casado</label><br>
        <input class="radio-civil" type="radio" id="partner" name="civilstatus" value="pareja de hecho">
        <label for="partner">Pareja de hecho</label><br>
        <input class="radio-civil" type="radio" id="single" name="civilstatus" value="soltero">
        <label for="single">Soltero</label><br>
        <input class="radio-civil" type="radio" id="widower" name="civilstatus" value="viudo">
        <label for="widower">Viudo</label><br>
        <input class="radio-civil" type="radio" id="divorced" name="civilstatus" value="divorciado">
        <label for="divorced">Divorciado</label><br>
    </div>
    <div>
        <input type="number" name="patrimonio">
        <label>Patrimonio</label>
    </div>
    <button type="submit">Enviar</button>
</form>

    