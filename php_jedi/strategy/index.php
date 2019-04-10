<?php
require_once "classes.php";

$Produto = new Produto();
$Produto->getLista();

$Produto->setOutput(new ArrayOutput());
$data = $Produto->getOutput();

print_r($data);
?>