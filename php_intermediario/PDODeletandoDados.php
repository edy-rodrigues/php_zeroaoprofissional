<?php

// Credenciais da conexão
$dsn = "mysql:dbname=db_blog;host=localhost";
$dbuser = "root";
$dbpass = "";

try {

    // Instanciando PDO
    $pdo = new PDO($dsn, $dbuser, $dbpass);

    $sql = "DELETE FROM tb_usuario WHERE id = 4";
    $sql = $pdo->query($sql);
    
    echo "Usuario deletado com sucesso!";

    // Tratando erro
} catch(PDOException $e) {
    echo "Falhou: ". $e->getMessage();
}

?>