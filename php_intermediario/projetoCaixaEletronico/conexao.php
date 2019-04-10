<?php

$dns = "mysql:dbname=db_projetocaixaeletronico;host=localhost";
$dbuser = "root";
$dbpass = "";

try {

    $db = new PDO($dns, $dbuser, $dbpass);

} catch (PDOException $e) {
    echo "ERRO: ". $e->getMessage();
    exit;
}

?>