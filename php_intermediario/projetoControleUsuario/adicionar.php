<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar Usuário</title>
</head>
<body>
<?php
require_once "conexao.php";

if(isset($_POST['txt-nome']) && empty($_POST['txt-nome']) == false) {
    $nome = addslashes($_POST['txt-nome']);
    $email = addslashes($_POST['txt-email']);
    $senha = md5(addslashes($_POST['txt-senha']));
    
    $sql = "INSERT INTO tb_usuario SET nome = '$nome', email = '$email', senha ='$senha'";
    $pdo->query($sql);

    header("Location: index.php");
}
?>
<form method="POST">
    Nome: <br/>
    <input type="text" name="txt-nome" required><br/>
    E-mail: <br/>
    <input type="email" name="txt-email" required><br/>
    Senha: <br/>
    <input type="password" name="txt-senha" required><br/>
    <input type="submit" value="Cadastrar">
    <input type="reset" value="Cancelar">
</form>
</body>
</html>