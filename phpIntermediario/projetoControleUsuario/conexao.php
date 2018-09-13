<?php

// Credenciais da conexão
$dsn = "mysql:dbname=db_blog;host=localhost";
$dbuser = "root";
$dbpass = "";

try {

    // Instanciando PDO
    $pdo = new PDO($dsn, $dbuser, $dbpass);
 

    // Tratando erro
} catch(PDOException $e) {
    echo "Falhou: ". $e->getMessage();
}

?>