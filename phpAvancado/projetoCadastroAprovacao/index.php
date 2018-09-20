<?php
require_once "conexao.php";

if(isset($_POST['txt-nome']) && !empty($_POST['txt-nome'])) {
    $nome = addslashes($_POST['txt-nome']);
    $email = addslashes($_POST['txt-email']);
    $status = 0;
    
    $pdo->query("INSERT INTO tb_usuario(nome, email, status) VALUES ('$nome', '$email', $status) ");
    $id = $pdo->lastInsertId();

    $md5 = md5($id);
    $link = 'https://www.dependedenos.com.br/cadastroconfirma/confirma.php?h='.$md5;

    $assunto = "Confirme seu cadastro";
    $msg = "Clique no link abaixo para confirmar seu cadastro:\n\n".$link;
    $header = "From: contato@dependedenos.com.br"."\r\n"."X-Mailer: PHP/".phpversion();

    mail($email, $assunto, $msg, $header);

    echo "<h2>OK! Confirme seu cadastro agora!</h2>";
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro com Aprovação</title>
</head>
<body>

<form method="POST">
    Nome: <br>
    <input type="text" name="txt-nome"><br><br>

    E-mail: <br>
    <input type="email" name="txt-email"><br><br>

    <input type="submit" value="Cadastrar">
</form>

</body>
</html>