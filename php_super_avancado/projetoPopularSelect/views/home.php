<form action="" method="post">
    Escolha o módulo: <br>
    <select name="select-modulo" id="select-modulo">
        <option value=""></option>
        <?php foreach($modulos as $m): ?>
        <option value="<?php echo $m['id']; ?>"><?php echo $m['titulo']; ?></option>
        <?php endforeach; ?>
    </select><br><br>

    Escolha a aula: <br>
    <select name="select-aula" id="select-aula">
        <option value=""></option>
    </select><br><br>

    <input type="submit" value="Enviar">
</form>