<div class="container">
    <h1>Acesso ao Login</h1>
    <?php
    if(isset($txt_email) && !$txt_email) {
        ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4><strong>Campos em braco.</strong></h4>
            <p>Por favor preencha seu <strong>E-mail</strong></p>
        </div>
        <?php
    } else {
        if(isset($campos_vazio) && !$campos_vazio) {
            if(isset($login_sucesso) && !$login_sucesso) {
                ?>
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h4><strong>Que pena! Houve um erro</strong></h4>
                    <p>Usuário e/ou senha incorretos!</p>
                </div>
                <?php
            }
        } else {
            if(isset($txt_senha) && !$txt_senha) {
                ?>
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h4><strong>Campos em branco</strong></h4>
                    <p>Por favor preencha o campo <strong>Senha</strong>!</p>
                </div>
                <?php
            }
        }
    }
    ?>
    <form method="post">
        <div class="form-group">
            <label for="txt-email">E-mail: </label>
            <input type="text" name="txt-email" id="txt-email" class="form-control" <?php if(isset($txt_email_tmp)) { echo "value='$txt_email_tmp'"; } ?>>
            <span class="help-block"><small>Campo Obrigatório</small></span>
        </div>
        <div class="form-group">
            <label for="txt-senha">Senha: </label>
            <input type="password" name="txt-senha" id="txt-senha" class="form-control" <?php if(isset($txt_senha_tmp)) { echo "value='$txt_senha_tmp'"; } ?>>
            <span class="help-block"><small>Campo Obrigatório</small></span>
        </div>
        <input type="submit" value="Fazer Login" class="btn btn-block btn-primary">
    </form>
</div>