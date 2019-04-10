<?php

try {
    $pdo = new PDO("mysql:dbname=db_projetopesquisavariascolunas;host=localhost", "root", "");
} catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
}

?>