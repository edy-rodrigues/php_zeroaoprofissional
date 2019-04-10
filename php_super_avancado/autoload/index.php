<?php
spl_autoload_register(function($class) {
    require_once "classes/".$class.".class.php";
});

$Cavalo = new Cavalo();
$Cavalo->falar();

$Pessoa = new Pessoa();
$Pessoa->falar();
?>