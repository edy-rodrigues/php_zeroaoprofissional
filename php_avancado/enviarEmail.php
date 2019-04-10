<?php

if(isset($_POST['txt-nome']) && !empty($_POST['txt-nome'])) {
    $nome = addslashes($_POST['txt-nome']);
    $email = addslashes($_POST['txt-email']);
    $mensagem = addslashes($_POST['txt-mensagem']);

    $para = "erodrigues@resuldata.com.br";
    $assunto = "Pergunta do Contato";
    $corpo = "Nome: ".$nome.", E-mail: ".$email.", Mensagem: ".$mensagem;
    $cabecalho = "From: edineibk@gmail.com"."\r\n"."Reply-to: ".$email."\r\n"."X-Mailer: PHP/".phpversion();

    mail($para, $assunto, $corpo, $cabecalho);

    echo "E-mail enviado com sucesso!";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enviar E-mail</title>
</head>
<body>

<form method="POST">
    <label for="txt-nome">Nome: </label><br>
    <input type="text" name="txt-nome" id="txt-nome"><br><br>
    <label for="txt-email">E-mail: </label><br>
    <input type="text" name="txt-email" id="txt-email"><br><br>
    <label for="txt-mensagem">Mensagem: </label><br>
    <textarea type="text" name="txt-mensagem" id="txt-mensagem"></textarea><br><br>
    <input type="submit" value="Enviar">
</form>


</body>
</html>