<?php
session_start();
require_once 'conexao.php';

if(isset($_POST['txt-agencia']) && !empty($_POST['txt-agencia'])) {
    $agencia = addslashes($_POST['txt-agencia']);
    $conta = addslashes($_POST['txt-conta']);
    $senha = md5(addslashes($_POST['txt-senha']));

    $sql = "SELECT * FROM tb_conta WHERE agencia = :agencia AND conta = :conta AND senha = :senha";
    $sql = $db->prepare($sql);
    $sql->bindValue(":agencia", $agencia);
    $sql->bindValue(":conta", $conta);
    $sql->bindValue(":senha", $senha);
    $sql->execute();

    if ( $sql->rowCount() > 0 ) {
        $sql = $sql->fetch();
        $_SESSION['banco'] = $sql['id'];

        header("Location: index.php");
        exit;
    } else {
        echo "Usuário e/ou senha incorreto!";
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
<form method="POST">
    Agência: <br/>
    <input type="text" name="txt-agencia"><br/><br/>

    Conta: <br/>
    <input type="text" name="txt-conta"><br/><br/>

    Senha: <br/>
    <input type="password" name="txt-senha"><br/><br/>

    <input type="submit" value="Entrar">
</form>
</body>
</html>