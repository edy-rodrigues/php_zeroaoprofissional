<?php

class Usuario {

    public function create($nome, $email, $senha, $telefone) {
        global $pdo;
        $sql = "SELECT id FROM tb_usuario WHERE email = :email";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() == 0) {
            $sql = "INSERT INTO tb_usuario(nome, email, senha, telefone) VALUES(:nome, :email, :senha, :telefone)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", md5($senha));
            $sql->bindValue(":telefone", $telefone);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function login($email, $senha) {
        global $pdo;

        $sql = "SELECT id FROM tb_usuario WHERE email = :email AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0) {
            $data = $sql->fetch();
            $_SESSION['cLogin'] = $data['id'];
            return true;
        } else {
            return false;
        }
    }

}

?>