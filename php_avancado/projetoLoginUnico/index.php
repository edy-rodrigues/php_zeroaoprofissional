<?php
session_start();

require_once "conexao.php";

if(empty($_SESSION['lg'])) {
    header("Location: login.php");
    exit;
} else {
    $id = $_SESSION['lg'];
    $ip = $_SERVER['REMOTE_ADDR'];

    $sql = "SELECT * FROM tb_usuario WHERE id = :id AND ip = :ip";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->bindValue(":ip", $ip);
    $sql->execute();

    if($sql->rowCount() == 0) {
        header("Location: login.php");
        exit;
    }
}

echo "index.php";
?>