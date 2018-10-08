<?php
session_start();
if(!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = md5(time().rand(0,999));
}

if(!empty($_POST['txt-email'])) {
    $email = $_POST['txt-email'];
    $senha = $_POST['txt-senha'];

    if($_POST['crsf_token'] == $_SESSION['csrf_token']) {
        if($email == "edinei@gmail.com" && $senha == "123") {
            echo "ACESSO OK";
        } else {    
            echo "ACESSO NEGADO!";
        }
    } else {
        echo "Este formuário está invalido. Possivelmente pode ser um ataque hacker";
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

    <input type="hidden" name="crsf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

    <input type="submit" value="Enviar">
</form>

</body>
</html>