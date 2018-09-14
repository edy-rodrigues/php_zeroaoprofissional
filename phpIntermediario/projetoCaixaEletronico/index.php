<?php
session_start();
require_once 'conexao.php';
if(isset($_SESSION['banco']) && !empty($_SESSION['banco'])) {
    $id = $_SESSION['banco'];

    $sql = "SELECT * FROM tb_conta WHERE id = :id";
    $sql = $db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if ( $sql->rowCount() > 0 ) {
        $conta = $sql->fetch();
    } else {
        header("Location: login.php");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Caixa Eletrônico Online</title>
    <style>
        body {
            display: flex;
            justify-content: center;
        }
        .container {
            flex: 1;
            padding: 1rem;
            max-width: 1000px;
        }
        table {
            width: 100%;
        }
        table th, table td {
            padding: 1rem;
            border: 1px solid #ccc;
        }
        table th {
            color: #111;
            font-size: 22px;
        }
        table td {
            color: #444;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Banco XYZ</h1>
    Titular: <?php echo $conta['titular']; ?><br/>
    Agência: <?php echo $conta['agencia']; ?><br/>
    Conta: <?php echo $conta['conta']; ?><br/>
    Saldo: <?php echo $conta['saldo']; ?><br/>
    <a href="sair.php">Sair</a>
    <hr>
    <h3>Movimentação/Extrato</h3>
    <a href="addTransacao.php">Adicionar Transação</a><br><br>
    <table>
        <tr>
            <th>Data</th>
            <th>Valor</th>
        </tr>
        <?php 
        $sql = "SELECT * FROM tb_historico WHERE fk_conta = :id_conta";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_conta", $id);
        $sql->execute();

        if ( $sql->rowCount() > 0 ) {
            foreach ($sql->fetchAll() as $item) {
                ?>
                <tr>
                    <td><?php echo date('d/m/Y H:i', strtotime($item['data_operacao'])); ?></td>
                    <td style="color: <?php echo $item['tipo'] == 0 ? 'green' : 'red' ?>">R$ <?php echo $item['valor']; ?></td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>
</body>
</html>