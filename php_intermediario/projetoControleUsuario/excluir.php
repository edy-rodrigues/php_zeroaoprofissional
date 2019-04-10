<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excluir Usuário</title>
</head>
<body>
<?php

require_once "conexao.php";
if(isset($_GET['id']) && empty($_GET['id']) == false) {
    $id = addslashes($_GET['id']);

    $sql = "DELETE FROM tb_usuario WHERE id = '$id'";
    $pdo->query($sql);

    header("Location: index.php");
} else {
    header("Location: index.php");
}

?>
</body>
</html>