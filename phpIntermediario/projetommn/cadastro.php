<?php

session_start();
require_once "conexao.php";

if(!empty($_POST['txt-nome']) && !empty($_POST['txt-email'])) {
    $nome = addslashes($_POST['txt-nome']);
    $email = addslashes($_POST['txt-email']);
    $fk_pai = $_SESSION['mmnlogin'];
    $senha = md5($email);

    $sql = $db->prepare("SELECT email FROM tb_usuario WHERE email = :email");
    $sql->bindValue(":email", $email);
    $sql->execute();

    if($sql->rowCount() == 0) {
        $sql = $db->prepare("INSERT INTO tb_usuario (fk_pai, nome, email, senha) VALUES (:fk_pai, :nome, :email, :senha)");
        $sql->bindValue(":fk_pai", $fk_pai);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        header("Location: index.php");
        exit;
    } else {
        echo "Já existe um usuário com este e-mail!";
    }
}

?>

<form method="POST">
    Nome:<br/>
    <input type="text" name="txt-nome"><br/><br/>

    E-mail: <br/>
    <input type="email" name="txt-email"><br/><br/>

    <input type="submit" value="Cadastrar">
    <input type="reset" value="Limpar">
</form>