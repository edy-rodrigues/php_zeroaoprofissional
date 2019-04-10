<?php

// Credenciais da conexão
$dsn = "mysql:dbname=db_blog;host=localhost";
$dbuser = "root";
$dbpass = "";

try {

    // Instanciando PDO
    $pdo = new PDO($dsn, $dbuser, $dbpass);

    // Criando e executando consulta
    $sql = "SELECT * FROM tb_usuario";
    $sql = $pdo->query($sql);

    if ( $sql->rowCount() > 0 ) {
        
        // Percorrendo a consulta
        foreach ( $sql->fetchAll() as $usuario ) {
            echo "Nome: " . $usuario["nome"] . " - " . $usuario["email"] . "<br />";
        }

    } else {
        echo "Não há usuarios cadastrados!";
    }

    // Tratando erro
} catch(PDOException $e) {
    echo "Falhou: ". $e->getMessage();
}

?>