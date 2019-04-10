<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login de acesso</title>
</head>
<body>

<?php

session_start();

require_once "conexao.php";

if(isset($_POST['txt-email']) && empty($_POST['txt-email']) == false) {
    $email = addslashes($_POST['txt-email']);
    $senha = md5(addslashes($_POST['txt-senha']));

    $sql = "SELECT * FROM tb_usuario WHERE email = '$email' AND senha = '$senha'";
    $sql = $db->query($sql);

    if($sql->rowCount() > 0) {

        $usuario = $sql->fetch();

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario ['nome'];

        header("Location: index.php");

    }
}

?>

<form method="POST">
    E-mail: <br/>
    <input type="email" name="txt-email" /><br/><br/>

    Senha: <br/>
    <input type="password" name="txt-senha"><br/><br/>
    <input type="submit" value="Entrar">
</form>

</body>
</html>