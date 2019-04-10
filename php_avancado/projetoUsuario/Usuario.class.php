<?php

class Usuario {

    private $id, $email, $senha, $nome, $pdo;

    public function __construct($id = '') {
        try {
            $this->pdo = new PDO("mysql:dbname=db_projetousuario;host=localhost", "root", "");
        } catch(PDOException $e) {
            echo "ERRO: ". $e->getMessage();
        }

        if ( !empty( $id ) ) {

            $sql = "SELECT * FROM tb_usuario WHERE id = ?";
            $sql = $this->pdo->prepare($sql);
            $sql->execute(array($id));

            if ( $sql->rowCount() > 0 ) {
                $data = $sql->fetch();
                
                $this->id = $data['id'];
                $this->email = $data['email'];
                $this->senha = $data['senha'];
                $this->nome = $data['nome'];
            } else {
                echo "Nenhum usuário encontrado";
            }
        }
    }

    public function __get($prop) {
        return $this->$prop;
    }
    public function __set($prop, $value) {
        $this->$prop = $value;
    }


    public function getId($id) {
        return $this->id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setSenha($senha) {
        $this->senha = md5($senha);
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getNome() {
        return $this->nome;
    }

    public function salvar() {
        if ( !empty( $this->id ) ) {
            $sql = "UPDATE tb_usuario SET email = ?, senha = ?, nome = ? WHERE id = ?";
            $sql = $this->pdo->prepare($sql);
            $sql->execute(array($this->email, $this->senha, $this->nome, $this->id));
        } else {
            $sql = "INSERT INTO tb_usuario SET email = ?, senha = ?, nome = ?";
            $sql = $this->pdo->prepare($sql);
            $sql->execute(array($this->email, $this->senha, $this->nome));
        }
    }

    public function delete() {
        $sql = "DELETE FROM tb_usuario WHERE id = ?";
        $sql = $this->pdo->prepare($sql);
        $sql->execute(array($this->id));
    }

}

?>