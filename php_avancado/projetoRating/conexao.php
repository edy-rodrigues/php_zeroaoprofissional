<?php

try {
    $pdo = new PDO("mysql:dbname=db_projetorating;host=localhost", "root", "");
} catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}

?>