<?php

$dns = "mysql:dbname=db_projetocomentario;host=localhost";
$dbuser = "root";
$dbpass = "";

try {
    $db = new PDO($dns, $dbuser, $dbpass);
} catch (PDOException $e) {
    echo "ERRO: ". $e->getMessage();
    exit;
}
?>