<?php
require_once "config.php";

if(isset($_POST['txt-email']) && !empty($_POST['txt-email'])) {
    $email = addslashes($_POST['txt-email']);
    $senha = md5($_POST['txt-senha']);

    $sql = "SELECT * FROM tb_usuario WHERE email = :email AND senha = :senha";
    $sql = $db->prepare($sql);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":senha", $senha);
    $sql->execute();

    if($sql->rowCount() > 0) {
        echo "Usuário logado com sucesso !";
    } else {
        echo "E-mail e/ou senha estão incorretos";
    }
} else {
    echo "Digite um e-mail e/ou senha!";
}
?>