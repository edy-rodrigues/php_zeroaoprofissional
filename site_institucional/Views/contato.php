<div class="container-contato content m-auto p-1">
    <h1>Contato</h1>
    <form method="post">
        <?php echo !empty($aviso) ? $aviso.'<br><br>' : ''; ?>
        Nome: <br>
        <input type="text" name="nome"><br><br>
        E-mail: <br>
        <input type="text" name="email"><br><br>
        Mensagem: <br>
        <textarea name="mensagem" rows="10"></textarea><br><br>
        <input type="submit" class="btn" value="Enviar Mensagem">
    </form>
</div>