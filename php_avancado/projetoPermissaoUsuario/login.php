<?php

session_start();
require_once "conexao.php";
require_once "classes/Usuario.class.php";

if(isset($_POST['txt-email']) && !empty($_POST['txt-senha'])) {
    $email = addslashes($_POST['txt-email']);
    $senha = md5(addslashes($_POST['txt-senha']));

    $usuario = new Usuario($pdo);

    if($usuario->logar($email, $senha)) {
        header("Location: index.php");
        exit;
    } else {
        echo "E-mail e/ou senha estão incorretos";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login de Acesso</title>
</head>
<body>
<h2>Login</h2>
<form action="" method="post">
    E-mail: <br>
    <input type="email" name="txt-email"><br><br>

    Senha: <br>
    <input type="password" name="txt-senha"><br><br>

    <input type="submit" value="Entrar">
</form> 
</body>
</html>