<?php

class Log {

    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:dbname=db_projetologeventos;host=localhost", "root", "");
        } catch(PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
    }

    public function salvar($acao) {
        $ip = $_SERVER['REMOTE_ADDR'];

        $sql = "INSERT INTO tb_log (ip, data_acao, acao) VALUES (:ip, NOW(), :acao)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":ip", $ip);
        $sql->bindValue(":acao", $acao);
        $sql->execute();
    }

}

?>