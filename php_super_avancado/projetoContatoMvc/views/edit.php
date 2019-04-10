<form action="" method="post">
    <label for="">Nome:</label><br>
    <input type="text" name="txt-nome" value="<?php echo $contato['nome']; ?>"><br><br>
    <label for="">E-mail:</label><br>
    <input type="text" name="txt-email" value="<?php echo $contato['email']; ?>"><br><br>
    <a href="<?php echo BASE_URL; ?>" class="btn btn-red">Lista de Contatos</a>
    <input type="submit" value="Salvar" class="btn">
</form>