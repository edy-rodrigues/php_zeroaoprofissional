<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plataforma de Marketing Multinível</title>
</head>
<body>

<?php

session_start();
require_once "conexao.php";
require_once "functions.php";

if(empty($_SESSION['mmnlogin'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['mmnlogin'];

$sql = $db->prepare("SELECT
u.nome, t.nome as p_nome 
FROM tb_usuario u
LEFT JOIN tb_patente t ON t.id = u.fk_patente
WHERE u.id = :id");
$sql->bindValue(":id", $id);
$sql->execute();

if($sql->rowCount() > 0) {
    $sql = $sql->fetch();
    $nome = $sql['nome'];
    $p_nome = utf8_encode($sql['p_nome']);
} else {
    header("Location: login.php");
    exit;
}

$lista = listar($id, $limite);

?>
<h1>Sistema de Marketing Multinível</h1>
<h2><?php echo "Usuário Logado: ". $nome. ' ('.$p_nome.')' ?></h2>

<a href="cadastro.php">Cadastrar novo usuário</a>

<a href="sair.php">Sair</a>

<hr/>

<h4>Lista de Cadastros</h4>

<?php exibir($lista); ?>

</body>
</html>