<<<<<<< HEAD
<?php foreach($imagem as $img): ?>
<img src="assets/img/galeria" alt=""><br>
<?php echo $img['titulo']; ?>
=======
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
>>>>>>> 3dd44e489553d3ea1c02ed8f979a3ace252e3c9c
<hr>
<?php endforeach; ?>