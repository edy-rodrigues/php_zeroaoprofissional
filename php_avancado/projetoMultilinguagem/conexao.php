<?php

$dsn = "mysql:dbname=db_projetomultilinguagem;host=localhost";
$dbuser = "root";
$dbpass = "";

try {
    global $pdo;
    $pdo = new PDO($dsn, $dbuser, $dbpass);
} catch(PDOException $e) {
    echo "ERRO: ". $e->getMessage();
}

?>