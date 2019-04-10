<?php

$dns = "mysql:dbname=db_projetommn;host=localhost";
$dbuser = "root";
$dbpass = "";

try {
    global $db;
    $db = new PDO($dns, $dbuser, $dbpass);
} catch (PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}

$limite = 3;

$patentes = [];

?>