<?php

class Animal {

    public function getNome() {
        echo "getNome da classe Animal";
    }

    public function testar() {
        echo "tesTado!";
    }

}

class Cachorro extends Animal {

    public function getNome() {
        $this->testar();
    }

}

$cachorro = new Cachorro();

$cachorro->getNome();

?>