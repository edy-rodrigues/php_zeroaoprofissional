<?php

class Usuario {

    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:dbname=db_blog;host=localhost", "root", "");
        } catch (PDOException $e) {
            echo "ERRO: ". $e->getMessage();
        }
    }

    public function readOne($id) {
        $sql = $this->pdo->prepare("SELECT * FROM tb_usuario WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        $array = [];

        if ( $sql->rowCount() > 0 ) {
            $array = $sql->fetch();
        }
        return $array;
    }

    public function create($nome, $email, $senha) {
        $sql = $this->pdo->prepare("INSERT INTO tb_usuario SET nome = :nome, email = :email, senha = :senha");
        $sql->bindParam(":nome", $nome);
        $sql->bindParam(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();
    }

    public function update($id, $nome, $email, $senha) {
        $sql = $this->pdo->prepare("UPDATE tb_usuario SET nome = ?, email = ?, senha = ? WHERE id = ?");
        $sql->execute(array($nome, $email, md5($senha), $id));
    }

    public function delete($id) {
        $sql = $this->pdo->prepare("DELETE FROM tb_usuario WHERE id = ?");
        $sql->bindValue(1, $id);
        $sql->execute();
    }
     
}

?>