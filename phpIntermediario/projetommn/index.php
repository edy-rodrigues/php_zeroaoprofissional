<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plataforma de Marketing Multinível</title>
</head>
<body>

<?php

session_start();
require_once "conexao.php";

if(empty($_SESSION['mmnlogin'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['mmnlogin'];

$sql = $db->prepare("SELECT nome FROM tb_usuario WHERE id = :id");
$sql->bindValue(":id", $id);
$sql->execute();

if($sql->rowCount() > 0) {
    $sql = $sql->fetch();
    $nome = $sql['nome'];
} else {
    header("Location: login.php");
    exit;
}

?>
<h1>Sistema de Marketing Multinível</h1>
<h2><?php echo "Usuário Logado: ". $nome ?></h2>

<a href="cadastro.php">Cadastrar novo usuário</a>

<a href="sair.php">Sair</a>

</body>
</html>