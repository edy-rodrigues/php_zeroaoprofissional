<?php

require_once "conexao.php";

if(!empty($_GET['token'])) {
    $token = $_GET['token'];

    $sql = "SELECT * FROM tb_usuario_token WHERE token = :token AND usado = 0 AND expirado_em > NOW()";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":token", $token);
    $sql->execute();

    if($sql->rowCount() > 0) {

        if(isset($_POST['txt-senha']) && !empty($_POST['txt-senha'])) {
            $sql = $sql->fetch();
            $id = $sql['fk_usuario'];
            
            $senha = $_POST['txt-senha'];
            
            $sql = "UPDATE tb_usuario SET senha = :senha WHERE id = :id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":senha", md5($senha));
            $sql->bindValue(":id", $id);
            $sql->execute();

            $sql = "UPDATE tb_usuario_token SET usado = 1 WHERE token = :token";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":token", $token);
            $sql->execute();

            echo "Senha alterada com sucesso!";
            exit;
        }

        ?>
        <form method="POST">
            Nova senha: <br><br>
            <input type="password" name="txt-senha"><br><br>
            <input type="submit" value="Mudar senha">
        </form>
        <?php
    } else {
        echo "Token inválido ou já utilizado!";
    }
}

?>