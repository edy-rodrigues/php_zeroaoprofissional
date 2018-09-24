<?php
require_once "conexao.php";

date_default_timezone_set('America/Sao_Paulo');
$ip = $_SERVER['REMOTE_ADDR'];
$hora = date('H:i:s');
$sql = "INSERT INTO tb_acesso(ip, hora) VALUES(:ip, :hora)";
$sql = $pdo->prepare($sql);
$sql->bindValue(":ip", $ip);
$sql->bindValue(":hora", $hora);
$sql->execute();

$sql = $pdo->prepare("DELETE FROM tb_acesso WHERE hora < :hora");
$sql->bindValue(":hora", date('H:i:s', strtotime('-5 minutes')));
$sql->execute();

$sql = "SELECT * FROM tb_acesso WHERE hora > :hora GROUP BY ip";
$sql = $pdo->prepare($sql);
$sql->bindValue(":hora", date('H:i:s', strtotime('-5 minutes')));
$sql->execute();
$qtde_usuario_online = $sql->rowCount();

echo "ONLINE: ".$qtde_usuario_online;
?>