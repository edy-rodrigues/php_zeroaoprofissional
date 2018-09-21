<?php

class Carro {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function readAll() {
        $array = [];

        $sql = "SELECT * FROM tb_carro";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function readOne($id) {
        
    }

}

?>