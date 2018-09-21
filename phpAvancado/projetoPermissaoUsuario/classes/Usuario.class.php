<?php

class Usuario {

    private $pdo, $id, $permissao = [];

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function logar($email, $senha) {
        $sql = "SELECT * FROM tb_usuario WHERE email = :email AND senha = :senha";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();

            $_SESSION['logado'] = $sql['id'];

            return true;
        } else {
            return false;
        }
    }

    public function setUsuario($id) {
        $this->id = $id;

        $sql = "SELECT * FROM tb_usuario WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();

            $this->permissao = explode(",", $sql['permissao']);
        }
    }

    public function getPermissao() {
        return $this->permissao;
    }

    public function verificaPermissao($permissao) {
        if(in_array($permissao, $this->permissao)) {
            return true;
        } else {
            return false;
        }
    }

}

?>