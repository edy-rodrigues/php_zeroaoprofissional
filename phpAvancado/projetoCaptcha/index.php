<?php
session_start();

$letras = ['A', 'b', 'C', 'd', 'E', 'f', 'G', 'h', 'I', 'j', 'K', 'l', 'M', 'n', 'O', 'p', 'Q', 'R', 's', 'T', 'u', 'V', 'W', 'x', 'Y', 'z'];

if(!isset($_SESSION['captcha'])) {
    $n1 = rand(0, 9);
    $n2 = rand(0, 9);
    $letra1 = rand(0, 25);
    $letra2 = rand(0, 25);
    $_SESSION['captcha'] = $n1.$n2.$letras[$letra1].$letras[$letra2];
}

if(isset($_POST['txt-email']) && !empty($_POST['txt-email'])) {
    $email = addslashes($_POST['txt-email']);
    $senha = md5(addslashes($_POST['txt-senha']));
    $captcha = $_POST['txt-captcha'];

    if ($captcha == $_SESSION['captcha']) {
        echo "Acertou!<br>";
        echo "Logado com sucesso!<br>";
    } else {
        echo "Digite o código novamente!<br>";
    }

    $n1 = rand(0, 9);
    $n2 = rand(0, 9);
    $letra1 = rand(0, 25);
    $letra2 = rand(0, 25);
    $_SESSION['captcha'] = $n1.$letras[$letra1].$n2.$letras[$letra2];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto Captcha</title>
</head>
<body>
<form action="" method="post">
    E-mail: <br>
    <input type="email" name="txt-email"><br><br>
    
    Senha: <br>
    <input type="password" name="txt-senha"><br><br>

    <img src="imagem.php" width="130" height="50"><br><br>

    Captcha: <br>
    <input type="text" name="txt-captcha"><br><br>

    <input type="submit" value="Entrar">
</form>
</body>
</html>