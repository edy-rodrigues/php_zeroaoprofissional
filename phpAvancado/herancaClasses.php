<?php

class Animal {
    public $nome, $idade;
}

class Cavalo extends Animal {
    private $qtdePatas, $tipoPelo;
}

class Gato extends Animal {
    private $qtdePatas, $miado;
}

$cavalo = new Cavalo();
$gato = new Gato();

$cavalo->nome = "Hoys";

echo $cavalo->nome;

?>