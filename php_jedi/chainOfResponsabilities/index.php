<?php
require_once "classes.php";

$carga = new Carga(300);
$moto = new Moto();
$carro = new Carro();
$caminhao = new Caminhao();

$moto->setSucessor($carro);
$carro->setSucessor($caminhao);

$moto->transporte($carga);

?>