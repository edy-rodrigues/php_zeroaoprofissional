<?php
require_once "environment.php";
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

$config = [];

if(ENVIRONMENT == 'development') {
    define("BASE_URL", "http://phpzeroaoprofissional.pc:8080/site_institucional/");
    $config["dbname"] = "db_siteinstitucional";
    $config["host"] = "localhost";
    $config["dbuser"] = "root";
    $config["dbpass"] = "";
} else {
    
}

global $db;
try {
    $db = new PDO("mysql:dbname=".$config["dbname"].";host=".$config["host"], $config["dbuser"], $config["dbpass"]);
} catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}
?>