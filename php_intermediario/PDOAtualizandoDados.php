<?php

// Credenciais da conexão
$dsn = "mysql:dbname=db_blog;host=localhost";
$dbuser = "root";
$dbpass = "";

try {

    // Instanciando PDO
    $pdo = new PDO($dsn, $dbuser, $dbpass);

    $senha = md5("123");

    $sql = "UPDATE tb_usuario SET senha = '$senha' WHERE id < 3";
    $sql = $pdo->query($sql);

    echo "Senha alterada com sucesso!";

    // Tratando erro
} catch(PDOException $e) {
    echo "Falhou: ". $e->getMessage();
}

?>