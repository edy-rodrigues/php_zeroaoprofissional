<?php

class Usuario extends Model {

    public function getList() {
        $array = array();

        $sql = "SELECT * FROM tb_usuario";
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function getOne($id) {
        $sql = "SELECT * FROM tb_usuario WHERE id = $id";
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $sql["status"] = "OK";
        } else {
            $sql['status'] = "ERROR";
        }

        return $sql;
    }

    public function update($id, $nome, $email, $senha) {
        if(!$this->verificaSenha($id, $senha)) {
            $sql = "UPDATE tb_usuario SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", md5($senha));
            $sql->bindValue(":id", $id);
            $sql->execute();
        } else {
            $sql = "UPDATE tb_usuario SET nome = :nome, email = :email WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":id", $id);
            $sql->execute();
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM tb_usuario WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function add($nome, $email, $senha) {
        $sql = "INSERT INTO tb_usuario(nome, email, senha) VALUES(:nome, :email, :senha)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();
    }

    private function verificaSenha($id, $senha) {
        $sql = "SELECT senha FROM tb_usuario WHERE id = :id, senha = :senha";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":senha", $senha);

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}

?>