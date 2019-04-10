<?php

class Pessoa {

    private $nome, $idade;

    public static function getInstance() {

        static $instance = null;
        if($instance === null) {
            $instance = new Pessoa();
        }

        return $instance;

    }

    private function __construct() {

    }

    public function __set($attribute, $value) {
        $this->$attribute = $value;
    }
    public function __get($attribute) {
        return $this->$attribute;
    }

}

$cara = Pessoa::getInstance();
$cara->__set("nome", "Edinei");

$cara2 = Pessoa::getInstance();
$cara2->__set("idade", 19);

echo "NOME: ". $cara2->__get("nome")."<br>";
echo "IDADE: ". $cara->__get("idade")."<br>";

?>