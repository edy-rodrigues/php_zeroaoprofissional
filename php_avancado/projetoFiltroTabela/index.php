<?php

require_once "conexao.php";

if(isset($_POST['select']) && $_POST['select'] != '') {
    $sexo = $_POST['select'];
    $sql = "SELECT * FROM tb_usuario WHERE sexo = :sexo";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":sexo", $sexo);
    $sql->execute();
} else {
    $sexo = '';
    $sql = "SELECT * FROM tb_usuario";
    $sql = $pdo->prepare($sql);
    $sql->execute();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto Filtro em Tabela</title>
    <style>
        table th, table td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Lista de Usuários</h1>
<form method="post">
    <select name="select">
        <option></option>
        <option value="0" <?php echo $sexo == '0' ? 'selected="selected"' : ''; ?>>Masculino</option>
        <option value="1" <?php echo $sexo == '1' ? 'selected="selected"' : ''; ?>>Feminino</option>
    </select>
    <input type="submit" value="Filtar">
</form><br><br>

<table>
    <tr>
        <th>ID</th>
        <th>E-mail</th>
        <th>CPF</th>
        <th>Nome</th>
        <th>Sexo</th>
        <th>Idade</th>
    </tr>
    <?php
    $sexos = array(
        '0' => 'Masculino',
        '1' => 'Feminino'
    );
    
    if($sql->rowCount() > 0) {
        
        foreach ($sql->fetchAll() as $data) {
            

            echo "<tr>";
                echo "<td>". $data['id'] ."</td>";
                echo "<td>". $data['email'] ."</td>";
                echo "<td>". $data['cpf'] ."</td>";
                echo "<td>". $data['nome'] ."</td>";
                echo "<td>". $sexos[$data['sexo']] ."</td>";
                echo "<td>". $data['idade'] ."</td>";
            echo "</tr>";
        }
    } else {
        echo "Nenhum Usuário está cadastrado !";
        exit;
    }

    ?>
</table>
</body>
</html>