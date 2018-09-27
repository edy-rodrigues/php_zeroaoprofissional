<?php
require_once "conexao.php";
require_once "classes/Reserva.class.php";
require_once "classes/Carro.class.php";

$reserva = new Reserva($pdo);
$carro = new Carro($pdo);

if(empty($_GET['select-ano'])) {
    header("Location: index.php?select-ano=".date('Y')."&select-mes=".date('m'));
} else {
    $ano_filtrado = $_GET['select-ano'];
    $mes_filtrado = $_GET['select-mes'];
    $data = $ano_filtrado .'-'. $mes_filtrado;
    $dia1 = date('w', strtotime($data));
    $dias = date('t', strtotime($data));
    $linhas = ceil(($dias + 1) / 7);
    $dia1 = -$dia1;
    $data_inicio = date('Y-m-d', strtotime($dia1 .' days', strtotime($data)));
    $data_fim = date('Y-m-d', strtotime(( ($dia1 + ($linhas*7) -1) ).' days', strtotime($data)));
    $meses = ['', 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
    
    $lista_reserva = $reserva->readAll($data_inicio, $data_fim);
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto Reservas</title>
    <style>
        .container {
            width: 100%;
            max-width: 1000px;
            margin: auto;
        }

        table {
            width: 100%;
        }

        table th, table td {
            border: 1px solid #333;
            padding: 10px;
        }

        table td > div {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        table td div > div {
            font-size: 13px;
            padding: 10px 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Sistema de Reservas</h1>

    <a href="adicionar_reserva.php">Adicionar Nova Reserva</a><br><br>
    <form action="" method="get">
        <select name="select-ano">
            <?php for($q = date('Y'); $q >= 2000; $q--): ?>
            <option value="<?php echo $q; ?>" <?php echo $ano_filtrado == $q ? 'selected="selected"' : '' ?>><?php echo $q; ?></option>
            <?php endfor; ?>
        </select>
        <select name="select-mes">
            <?php for($q = 1; $q <= 12; $q++): ?>
            <option value="<?php echo $q; ?>" <?php echo $mes_filtrado == $q ? 'selected="selected"' : '' ?>><?php echo $meses[$q]; ?></option>
            <?php endfor; ?>
        </select>
        <input type="submit" value="Filtrar Data">
    </form>

    <h3>Calendário das Reservas</h3>
    <?php
    require_once "calendario.php";
    ?>
</div>

</body>
</html>