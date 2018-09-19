<?php

class Contato {

    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:dbname=db_projetocontato;host=localhost", "root", "");
    }

    public function add($email, $nome = '') {
        // Verificar se o email existe no sistema
        if ( !$this->verificarEmail($email) ) {
            $sql = "INSERT INTO tb_contato (nome, email) VALUES (:nome, :email)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM tb_contato";
        $sql = $this->pdo->query($sql);

        if ( $sql->rowCount() > 0 ) {
            return $sql->fetchAll();
        } else {
            return [];
        }
    }

    public function get($id) {
        $sql = "SELECT * FROM tb_contato WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if( $sql->rowCount() > 0 ) {
            $info = $sql->fetch();
            return $info;
        } else {
            return [];
        }
    }

    public function editarEmail($nome, $email) {
        if ( $this->verificarEmail($email) ) {
            $sql = "UPDATE tb_contato SET nome = :nome WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function editar($id, $nome) {
        $sql = "UPDATE tb_contato SET nome = :nome WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function excluirEmail($email) {
        if ( $this->verificarEmail($email) ) {
            $sql = "DELETE FROM tb_contato WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":email", $email);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function excluir($id) {
        $sql = "DELETE FROM tb_contato WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    private function verificarEmail($email) {
        $sql = "SELECT email FROM tb_contato WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ( $sql->rowCount() > 0 ) {
            return true;
        } else {
            return false;
        }
    }

}

?>