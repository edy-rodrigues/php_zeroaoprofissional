<?php
session_start();

require_once "conexao.php";

$_SESSION['lg'] = '';

if(isset($_POST['txt-email']) && !empty($_POST['txt-email'])) {
    $email = addslashes($_POST['txt-email']);
    $senha = md5(addslashes($_POST['txt-senha']));

    $sql = "SELECT * FROM tb_usuario WHERE email = :email AND senha = :senha";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":senha", $senha);
    $sql->execute();


    if($sql->rowCount() > 0) {
        $sql = $sql->fetch();
        $id = $sql['id'];
        $ip = $_SERVER['REMOTE_ADDR'];

        $_SESSION['lg'] = $id;

        $sql = "UPDATE tb_usuario SET ip = :ip WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":ip", $ip);
        $sql->bindValue(":id", $id);
        $sql->execute();

        header("Location: index.php");
        exit;
    } else {
        echo "Login e/ou senha incorretos!";   
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
    <h1>Login de Acesso</h1>
    <form action="" method="post">
        E-mail: <br>
        <input type="email" name="txt-email"><br><br>

        Senha: <br>
        <input type="password" name="txt-senha"><br><br>

        <input type="submit" value="Entrar">

    </form>
</body>
</html>