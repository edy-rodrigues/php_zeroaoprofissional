<?php

require_once "conexao.php";

if(isset($_POST['txt-email']) && !empty($_POST['txt-email'])) {
    $email = $_POST['txt-email'];

    $sql = "SELECT * FROM tb_usuario WHERE email = :email";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":email", $email);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $sql = $sql->fetch();
        $id = $sql['id'];

        $token = md5($id.time());

        $sql = "INSERT INTO tb_usuario_token(fk_usuario, token, expirado_em) VALUES(:id_usuario, :token, :expirado)";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id_usuario", $id);
        $sql->bindValue(":token", $token);
        $sql->bindValue(":expirado", date('Y-m-d H:i', strtotime('+2 days')));
        $sql->execute();

        $link = "http://localhost:8080/php_zeroaoprofissional/phpAvancado/projetoEsqueciASenha/redefinir.php?token=".$token;

        $msg = "Clique no link para redefinir sua senha: <br>".$link;

        $assunto = "Redefinição de senha";

        $header = "From: contato@dependedenos.com.br"."\r\n"."X-Mailer: PHP/".phpversion();

        // mail($email, $assunto, $msg, $header);

        echo $msg;
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Esqueci a minha senha</title>
</head>
<body>

<form method="POST">
    Digite seu e-mail: <br><br>
    <input type="email" name="txt-email"><br><br>

    <input type="submit" value="Recuperar Senha">
</form>

</body>
</html>