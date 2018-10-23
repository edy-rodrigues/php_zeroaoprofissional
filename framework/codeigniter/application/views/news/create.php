<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open('news/create'); ?>
    Titutlo: <br>
    <input type="text" name="title"><br><br>

    Texto: <br>
    <textarea name="text"></textarea><br><br>

    <input type="submit" value="Salvar">
</form>