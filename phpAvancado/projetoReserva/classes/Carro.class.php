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
        $carro = [];

        $sql = "SELECT * FROM tb_carro WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $carro = $sql->fetch();
        }

        return $carro;
    }

}

?>