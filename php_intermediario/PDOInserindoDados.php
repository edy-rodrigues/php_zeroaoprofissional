<?php

// Credenciais da conexão
$dsn = "mysql:dbname=db_blog;host=localhost";
$dbuser = "root";
$dbpass = "";

try {

    // Instanciando PDO
    $pdo = new PDO($dsn, $dbuser, $dbpass);

    $nome = "Giovanna Cardozo";
    $email = "Giovanna@gmail.com";
    $senha = md5("123");

    $sql = "INSERT INTO tb_usuario SET nome = '$nome', email = '$email', senha = '$senha'";
    $sql = $pdo->query($sql);

    echo "Usuário inserido: " . $pdo->lastInsertId();

    // Tratando erro
} catch(PDOException $e) {
    echo "Falhou: ". $e->getMessage();
}

?>