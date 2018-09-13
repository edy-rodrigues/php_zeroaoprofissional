<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto Ordenar por Categoria</title>
    <style>
        .container {
            width: 100%;
            margin: auto;
            max-width: 1000px;
        }

        select {
            margin: 1rem;
        }

        table {
            color: #444;
        }

        table th {
            color: #111;
        }

        table td, table th {
            border: 1px solid #ccc;
            text-align: center;
        }
    </style>
</head>
<body>
<?php

require_once "conexao.php";

$ordem = "id";

if(isset($_GET['ordem']) && !empty($_GET['ordem'])) {
    $ordem = addslashes($_GET['ordem']);
}

?>

<div class="container">
    <form method="GET">
        <select name="ordem" id="select-usuario" onchange="this.form.submit()">
            <option value="id" <?php echo $ordem == "id" ? "selected" : ""; ?>>ID</option>
            <option value="nome" <?php echo $ordem == "nome" ? "selected" : ""; ?>>Nome</option>
            <option value="idade" <?php echo $ordem == "idade" ? "selected" : ""; ?>>Idade</option>
        </select>
    </form>

    <table width="100%">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
        </tr>

        <?php

        $sql = "SELECT * FROM tb_usuario ORDER BY $ordem, nome";
        $sql = $db->query($sql);

        $usuarios = $sql->fetchAll();

        foreach ($usuarios as $u) {
            echo "<tr>";
            echo "<td>".$u["id"]."</td>";
            echo "<td>".$u["nome"]."</td>";
            echo "<td>".$u["idade"]."</td>";
            echo "</tr>";
        }

        ?>

    </table>
</div>

</body>
</html>