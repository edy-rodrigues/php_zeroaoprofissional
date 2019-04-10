<?php
session_start();
require_once "vendor/autoload.php";
require_once "config.php";

spl_autoload_register(function($class) {
    if(file_exists("controllers/".$class.".class.php")) {
        require_once "controllers/".$class.".class.php";
    } 
    else if(file_exists("models/".$class.".class.php")) {
        require_once "models/".$class.".class.php";
    } 
    else if(file_exists("core/".$class.".class.php")) {
        require_once "core/".$class.".class.php";
    }
});

$Log = new Monolog\Logger("teste");
$Log->pushHandler(new Monolog\Handler\StreamHandler("erros.log", Monolog\Logger::WARNING));

$Log->addError("Aviso! Deu algo errado!");

$Core = new Core();
$Core->run();
?>