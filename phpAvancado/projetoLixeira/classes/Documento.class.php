<?php

class Documento {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listarTodos() {
        $array = [];

        $sql = "SELECT * FROM tb_documento WHERE status = 1";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function excluir($id) {
        $sql = "UPDATE tb_documento SET status = '0' WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

}

?>