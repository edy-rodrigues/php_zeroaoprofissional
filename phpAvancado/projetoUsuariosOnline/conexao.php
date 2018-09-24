<?php

try {
    $pdo = new PDO("mysql:dbname=db_blog;host=localhost", "root", "");
} catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}

?>