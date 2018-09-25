<?php require_once "pages/header.php"; ?>
<div class="container">
    <h1>Cadastre-se</h1>
    <?php
    require_once "classes/Usuario.class.php";
    $usuario = new Usuario();

    if(isset($_POST['txt-nome']) && empty($_POST['txt-nome'])) {
        ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4><strong>Campos em branco</strong></h4>
            <p>Por favor preencha o campo <strong>Nome</strong>!</p>
        </div>
        <?php
    } else {
        if(isset($_POST['txt-nome']) && !empty($_POST['txt-nome'])) {
            $nome = addslashes($_POST['txt-nome']);
            $email = addslashes($_POST['txt-email']);
            $senha = $_POST['txt-senha'];
            $telefone = addslashes($_POST['txt-telefone']);

            if(!empty($nome) && !empty($email) && !empty($senha)) {
                if($usuario->create($nome, $email, $senha, $telefone)) {
                    ?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <h4><strong>Parabéns</strong></h4>
                        <p>Cadastro feito com sucesso. <a href="login.php">Faça o login agora</a></p>
                    </div>
                    <?php 
                } else {
                    ?>
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <h4><strong>Erro ao cadastrar</strong></h4>
                        <p>Já existe um usuário com estes dados. <a href="login.php">Faça o login agora</a></p>
                    </div>
                    <?php
                }
            } else if(empty($email)) { 
                ?>
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h4><strong>Campos em branco</strong></h4>
                    <p>Por favor preencha o campo <strong>E-mail</strong>!</p>
                </div>
                <?php
            } else if(empty($senha)) { 
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
            <label for="txt-nome">Nome: </label>
            <input type="text" name="txt-nome" id="txt-nome" class="form-control" <?php echo isset($_POST['txt-nome']) && !empty($_POST['txt-nome']) ? "value='$nome'" : "" ?>>
            <span class="help-block"><small>Campo Obrigatório</small></span>
        </div>
        <div class="form-group">
            <label for="txt-email">E-mail: </label>
            <input type="text" name="txt-email" id="txt-email" class="form-control" <?php echo isset($_POST['txt-email']) && !empty($_POST['txt-email']) ? "value='$email'" : "" ?>>
            <span class="help-block"><small>Campo Obrigatório</small></span>
        </div>
        <div class="form-group">
            <label for="txt-senha">Senha: </label>
            <input type="password" name="txt-senha" id="txt-senha" class="form-control" <?php echo isset($_POST['txt-senha']) && !empty($_POST['txt-senha']) ? "value='$senha'" : "" ?>>
            <span class="help-block"><small>Campo Obrigatório</small></span>
        </div>
        <div class="form-group">
            <label for="txt-telefone">Telefone: </label>
            <input type="password" name="txt-telefone" id="txt-telefone" class="form-control" <?php echo isset($_POST['txt-telefone']) && !empty($_POST['txt-telefone']) ? "value='$telefone'" : "" ?>>
        </div>
        <input type="submit" value="Cadastrar" class="btn btn-block btn-primary">
    </form>
</div>
<?php require_once "pages/footer.php"; ?>