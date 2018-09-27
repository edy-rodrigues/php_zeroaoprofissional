<?php

class Reserva {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function readAll($data_inicio, $data_fim) {
        $array = [];

        $sql = "SELECT * FROM tb_reserva WHERE (NOT(data_inicio > :data_fim OR data_fim < :data_inicio))";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':data_inicio', $data_inicio);
        $sql->bindValue(':data_fim', $data_fim);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
    
    public function create($carro, $data_inicio, $data_fim, $nome_cliente) {
        $sql = "INSERT INTO tb_reserva(fk_carro, data_inicio, data_fim, pessoa) VALUES(:carro, :data_inicio, :data_fim, :pessoa)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":carro", $carro);
        $sql->bindValue(":data_inicio", $data_inicio);
        $sql->bindValue(":data_fim", $data_fim);
        $sql->bindValue(":pessoa", $nome_cliente);
        $sql->execute();
    }

    public function verificarDisponibilidade($carro, $data_incio, $data_fim) {
        $sql = "SELECT * 
        FROM tb_reserva 
        WHERE fk_carro = :carro 
        AND(NOT(data_inicio > :data_fim OR data_fim < :data_inicio))";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":carro", $carro);
        $sql->bindValue(":data_inicio", $data_incio);
        $sql->bindValue(":data_fim", $data_fim);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

}

?>