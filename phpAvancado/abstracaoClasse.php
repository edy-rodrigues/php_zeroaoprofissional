<?php

abstract class Personagem {
    private $nome, $idade;

    // Obriga a classe filho a ter este método
    abstract protected function andar();

    public function __get($prop) {
        return $this->$prop;
    }
    public function __set($prop, $value) {
        $this->$prop = $value;
    }
}

class Guerreiro extends Personagem {
    private $poderes = [], $vida, $mana;

    public function andar() {
        
    }
}

$guerreiro = new Guerreiro();

$guerreiro->__set("nome", "Elias");

echo $guerreiro->__get("nome");


?>