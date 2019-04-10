<?php
// Todo método tem que ser publico e não pode inserir conteúdo
interface Animal {

    public function andar();

}

class Cachorro implements Animal {

    public function andar() {
        echo "Estou andando...";
    }

}

$dog = new Cachorro();
echo $dog->andar();

?>