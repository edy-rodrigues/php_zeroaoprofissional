<?php

try {
    $pdo = new PDO("mysql:dbname=db_projetoesqueciasenha;host=localhost", "root", "");
} catch(PDOException $e) {
    echo "ERRO:". $e->getMessage();
}

?>