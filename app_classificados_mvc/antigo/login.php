<?php require_once "pages/header.php"; ?>
<div class="container">
    <h1>Acesso ao Login</h1>
    <?php
    require_once "classes/Usuario.class.php";
    $usuario = new Usuario();

    if(isset($_POST['txt-email']) && !empty($_POST['txt-email'])) {
        $email = addslashes($_POST['txt-email']);
        $senha = $_POST['txt-senha'];

        if($usuario->login($email, $senha)) {
            ?>
            <script>
                window.location.href="./"
            </script>
            <?php
        } else {
            ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><strong>Que pena! Houve um erro</strong></h4>
                <p>Usuário e/ou senha incorretos!</p>
            </div>
            <?php
        }
    }
    ?>
    <form method="post">
        <div class="form-group">
            <label for="txt-email">E-mail: </label>
            <input type="text" name="txt-email" id="txt-email" class="form-control" <?php if(isset($_POST['txt-email']) && !empty($_POST['txt-email'])) { echo "value='$email'"; } ?>>
            <span class="help-block"><small>Campo Obrigatório</small></span>
        </div>
        <div class="form-group">
            <label for="txt-senha">Senha: </label>
            <input type="password" name="txt-senha" id="txt-senha" class="form-control" <?php if(isset($_POST['txt-senha']) && !empty($_POST['txt-senha'])) { echo "value='$senha'"; } ?>>
            <span class="help-block"><small>Campo Obrigatório</small></span>
        </div>
        <input type="submit" value="Fazer Login" class="btn btn-block btn-primary">
    </form>
</div>
<?php require_once "pages/footer.php"; ?>