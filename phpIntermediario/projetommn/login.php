<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login de Acesso</title>
</head>
<body>

<?php

session_start();
require_once "conexao.php";

if(!empty($_POST['txt-email'])) {
    $email = addslashes($_POST['txt-email']);
    $senha = md5(addslashes($_POST['txt-senha']));

    echo $email."<br>".$senha;

    $sql = $db->prepare("SELECT * FROM tb_usuario WHERE email = :email AND senha = :senha");
    $sql->bindValue(":email", $email);
    $sql->bindValue(":senha", $senha);
    $sql->execute();

    if($sql->rowCount() > 0) {
        
        $usuario = $sql->fetch();
        $_SESSION['mmnlogin'] = $usuario['id'];

        header("Location: index.php");
        exit;

    } else {
        echo "Usuário e/ou senha incorretos!";
    }
}

?>

<form method="POST">
    E-mail: <br/>
    <input type="text" name="txt-email"><br/><br/>
    Senha: <br/>
    <input type="password" name="txt-senha"><br/><br/>

    <input type="submit" value="Entrar">
    <input type="reset" value="Limpar">
</form>

</body>
</html>