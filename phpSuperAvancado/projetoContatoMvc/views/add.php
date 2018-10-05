<h3>Adicionar</h3>

<form action="" method="post">
    <label for="">Nome:</label><br>
    <input type="text" name="txt-nome"><br><br>
    <label for="">E-mail:</label><br>
    <input type="text" name="txt-email"><br><br>
    <input type="submit" value="Adicionar" class="btn">
    <?php echo isset($error) && !empty($error) ? $error : '' ?>
</form>