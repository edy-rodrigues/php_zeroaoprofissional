<?php

if(isset($_POST['email']) && !empty($_POST['email'])) {
    $email =  $_POST['email'];
    $senha = $_POST['senha'];
    
    $pdo = new PDO("mysql:dbname=db_blog;host=localhost", "root", "");
    
    $sql = "SELECT * FROM tb_usuario WHERE email = :email AND senha = :senha";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":senha", $senha);
    $sql->execute();
    
    if($sql->rowCount() > 0) {
        echo "Usuário logado";
        exit;
    } else {
        echo "Errou e-mail e senha";
        exit;
    }
}
?>

<form action="" method="post">
    E-mail: <br>
    <input type="text" name="email"><br><br>
    Senha: <br>
    <input type="password" name="senha"><br><br>
    <input type="submit" value="Entrar">
</form>