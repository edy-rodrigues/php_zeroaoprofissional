<?php

class Contato extends Model {

    public function getAll() {
        $array = array();

        $sql = "SELECT * FROM tb_contato";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }

    public function getOne($id) {
        $array = array();

        $sql = "SELECT * FROM tb_contato WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function add($nome, $email) {
        if(!$this->emailExists($email)) {
            $sql = "INSERT INTO tb_contato(nome, email) VALUES(:nome, :email)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function update($id, $nome, $email) {
        $sql = "UPDATE tb_contato SET nome = :nome, email = :email WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM tb_contato WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    private function emailExists($email) {
        $sql = "SELECT * FROM tb_contato WHERE email = :email";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

}

?>