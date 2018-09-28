<?php
session_start();

global $pdo;

try {
    $pdo = new PDO("mysql:dbname=db_projetoclassificados;host=localhost", "root", "");
} catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}
?>