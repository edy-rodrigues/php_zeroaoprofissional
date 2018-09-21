<?php
require_once "conexao.php";
require_once "classes/Reserva.class.php";

$reserva = new Reserva($pdo);

$lista_reserva = $reserva->readAll();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto Reservas</title>
    <style>
        table th, table td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<h1>Sistema de Reservas</h1>

<a href="adicionar_reserva.php">Adicionar Nova Reserva</a>

<h3>Lista de Reservas</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Carro</th>
        <th>Data de Empréstimo</th>
        <th>Data de Devolução</th>
        <th>Nome do Cliente</th>
    </tr>
    <?php foreach ($lista_reserva as $item): ?>
    <tr>
        <td> <?php echo $item['id'] ?> </td>
        <td> <?php echo $item['fk_carro'] ?> </td>
        <td> <?php echo date("d/m/Y", strtotime($item['data_inicio'])) ?> </td>
        <td> <?php echo date("d/m/Y", strtotime($item['data_fim'])) ?> </td>
        <td> <?php echo $item['pessoa'] ?> </td>
    </tr>
    <?php endforeach; ?> 
</table>
</body>
</html>