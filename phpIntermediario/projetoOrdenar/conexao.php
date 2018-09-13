<?php

$dns = "mysql:dbname=db_projetoordenar;host=localhost";
$dbuser = "root";
$dbpass = "";

try {
    $db = new PDO($dns, $dbuser, $dbpass);
} catch(PDOException $e) {
    echo "ERRo: " . $e->getMessage();
    exit;
}

?>