<?php

try {
    $dsn = "mysql:dbname=depended_db_projetocadastroaprovacao;host=108.167.188.90";
    $dbuser = "depended_edinei";
    $dbpass = "cb30124584@";
    $pdo = new PDO($dsn, $dbuser, $dbpass);
} catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
}

?>