<div class="container">
    <h1>Cadastre-se</h1>
    <?php
    if(isset($txt_nome) && !$txt_nome) {
        ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4><strong>Campos em branco</strong></h4>
            <p>Por favor preencha o campo <strong>Nome</strong>!</p>
        </div>
        <?php
    } else {
        if(isset($campos_vazio) && !$campos_vazio) {
            if(isset($cadastrar_sucesso) && $cadastrar_sucesso) {
                ?>
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h4><strong>Parabéns</strong></h4>
                    <p>Cadastro feito com sucesso. <a href="<?php echo BASE_URL ?>/login">Faça o login agora</a></p>
                </div>
                <?php 
            } else {
                ?>
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h4><strong>Erro ao cadastrar</strong></h4>
                    <p>Já existe um usuário com estes dados. <a href="<?php echo BASE_URL ?>/login">Faça o login agora</a></p>
                </div>
                <?php
            }
        } else if(isset($txt_email) && !$txt_email) { 
            ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><strong>Campos em branco</strong></h4>
                <p>Por favor preencha o campo <strong>E-mail</strong>!</p>
            </div>
            <?php
        } else if(isset($txt_senha) && !$txt_senha) { 
            ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><strong>Campos em branco</strong></h4>
                <p>Por favor preencha o campo <strong>Senha</strong>!</p>
            </div>
            <?php
        }
    }
    ?>
    <form method="post">
        <div class="form-group">
            <label for="txt-nome">Nome: </label>
            <input type="text" name="txt-nome" id="txt-nome" class="form-control" <?php echo isset($txt_nome_tmp) ? "value='$txt_nome_tmp'" : "" ?>>
            <span class="help-block"><small>Campo Obrigatório</small></span>
        </div>
        <div class="form-group">
            <label for="txt-email">E-mail: </label>
            <input type="text" name="txt-email" id="txt-email" class="form-control" <?php echo isset($txt_email_tmp) ? "value='$txt_email_tmp'" : "" ?>>
            <span class="help-block"><small>Campo Obrigatório</small></span>
        </div>
        <div class="form-group">
            <label for="txt-senha">Senha: </label>
            <input type="password" name="txt-senha" id="txt-senha" class="form-control" <?php echo isset($txt_senha_tmp) ? "value='$txt_senha_tmp'" : "" ?>>
            <span class="help-block"><small>Campo Obrigatório</small></span>
        </div>
        <div class="form-group">
            <label for="txt-telefone">Telefone: </label>
            <input type="password" name="txt-telefone" id="txt-telefone" class="form-control" <?php echo isset($txt_telefone_tmp) ? "value='$txt_telefone_tmp'" : "" ?>>
        </div>
        <input type="submit" value="Cadastrar" class="btn btn-block btn-primary">
    </form>
</div>