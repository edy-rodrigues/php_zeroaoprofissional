<?php

class Pessoa {

    private $nome, $idade;

    public function __construct($nome, $idade) {
        $this->nome = $nome;
        $this->idade = $idade;
    }
    
    public function __get($attr) {
        return $this->$attr;
    }
}

class PessoaAdapter {
    private $sexo, $pessoa;

    public function __construct(Pessoa $pessoa) {
        $this->pessoa = $pessoa;
    }

    public function __get($attr) {
        if(isset($this->$attr)) {
            return $this->$attr;
        } else {
            return $this->pessoa->__get($attr);
        }
    }
    public function __set($attr, $val) {
        $this->$attr = $val;
    }
}

$pessoa = new Pessoa("Nome", 19);

$pa = new PessoaAdapter($pessoa);
$pa->__set("sexo", "Masculino");

echo "Nome: ".$pa->__get("nome")."<br>";
echo "Idade: ".$pa->__get("idade")."<br>";
echo "Sexo: ".$pa->__get("sexo")."<br>";

?>