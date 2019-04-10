<?php

require_once "conexao.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contorle de Usuários</title>
</head>
<body>
<a href="adicionar.php">Adicionar Usuário</a>
<table width="100%">
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Ações</th>
    </tr>
    <?php
        $sql = "SELECT * FROM tb_usuario";
        $sql = $pdo->query($sql);
        
        if($sql->rowCount() > 0) {
            foreach ($sql->fetchAll() as $usuario) {
                echo '<tr>';
                echo '<td>'.$usuario["nome"].'</td>';
                echo '<td>'.$usuario["email"].'</td>';
                echo '<td><a href="editar.php?id='.$usuario['id'].'">Editar</a> - <a href="excluir.php?id='.$usuario['id'].'">Excluir</a></td>';
                echo '</tr>';
            }
        }
    ?>
</table>
</body>
</html>