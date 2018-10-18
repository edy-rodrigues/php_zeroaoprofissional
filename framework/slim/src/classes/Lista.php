<?php

class Lista {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getLista() {
        $array = array();

        $sql = "SELECT * FROM tb_lista";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function add($data) {
        $sql = "INSERT INTO tb_lista(nome, telefone) VALUES(:nome, :telefone)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":nome", $data['nome']);
        $sql->bindValue(":telefone", $data['telefone']);
        $sql->execute();
    }

    public function getContato($id) {
        $array = array();

        $sql = "SELECT * FROM tb_lista WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function atualizar($id, $data) {
        $sql = "UPDATE tb_lista SET nome = :nome, telefone = :telefone WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":nome", $data['nome']);
        $sql->bindValue(":telefone", $data['telefone']);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function deletar($id) {
        $sql = "DELETE FROM tb_lista WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

}

?>