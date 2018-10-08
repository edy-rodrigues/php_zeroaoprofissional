<?php

function somar(float $a, float $b):float {
    return $a + $b;
}

echo "Soma: ".somar(1, 2);

class Carro {
    
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }
}

?>