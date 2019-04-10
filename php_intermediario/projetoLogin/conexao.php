<?php

$dns = "mysql:dbname=db_blog;host=localhost";
$dbuser = "root";
$dbpass = "";

try {
    $db = new PDO($dns, $dbuser, $dbpass);
} catch(PDOException $e) {
    echo "Falhou: " . $e->getMessage();
}

?>