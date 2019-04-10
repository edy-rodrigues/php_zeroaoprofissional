<?php

try {
    $db = new PDO("mysql:dbname=db_blog;host=localhost", "root", "");
} catch(PDOException $e) {
    echo "Erro: ". $e->getMessage();
}

?>