<h1>Projeto Galeria</h1>
<fieldset>
    <legend>Adicionar uma Foto</legend>
    <form action="" method="post" enctype="multipart/form-data">
        Título: <br>
        <input type="text" name="txt-titulo"><br><br>

        Foto: <br>
        <input type="file" name="file"><br><br>

        <input type="submit" value="Enviar">
    </form>
</fieldset>
<br><br>
<?php foreach($fotos as $foto): ?>
<img src="assets/images/galeria/<?php echo $foto['url']; ?>" width="300"><br>
<?php echo $foto['titulo']; ?>
<hr>
<?php endforeach; ?>