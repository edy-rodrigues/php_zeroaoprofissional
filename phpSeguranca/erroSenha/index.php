<?php
session_start();
if(!empty($_POST['txt-email'])) {
    $email = $_POST['txt-email'];
    $senha = $_POST['txt-senha'];

    if(isset($_SESSION['login_tentativas']) && $_SESSION['login_tentativas'] >= 3) {
        echo "Seu acesso está bloqueado";
    } else {
        if($email == "edinei@gmail.com" && $senha == "123") {
            echo "ACESSO OK";
        } else {
            if(!isset($_SESSION['login_tentativas'])) {
                $_SESSION['login_tentativas'] = 0;
            }
            $_SESSION['login_tentativas']++;
    
            echo "ACESSO NEGADO! Tentativas: ". $_SESSION['login_tentativas'];
        }
    }

    echo "<hr>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Segurança no Login</title>
</head>
<body>

<form action="" method="post">
    Email: <br>
    <input type="text" name="txt-email"><br><br>

    Senha: <br>
    <input type="text" name="txt-senha"><br><br>

    <input type="submit" value="Enviar">
</form>

</body>
</html>