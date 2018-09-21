<?php
require_once "conexao.php";
require_once "classes/Carro.class.php";
require_once "classes/Reserva.class.php";

$reserva = new Reserva($pdo);
$carro = new Carro($pdo);

$lista_carro = $carro->readAll();

if(isset($_POST['select-carro']) && $_POST['select-carro'] != '') {
    $carro = addslashes($_POST['select-carro']);
    $data_inicio = implode("-", array_reverse(explode("/", addslashes($_POST['txt-dataEmprestimo']))));
    $data_fim = implode("-", array_reverse(explode("/", addslashes($_POST['txt-dataDevolucao']))));
    $nome_cliente = addslashes($_POST['txt-nomeCliente']);

    if($reserva->verificarDisponibilidade($carro, $data_inicio, $data_fim)) {
        $reserva->create($carro, $data_inicio, $data_fim, $nome_cliente);
        header("Location: index.php");
        exit;
    } else {
        echo "Este carro já está reservado neste período!<br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adiconar Nova Reserva</title>
</head>
<body>
<h1>Adiconar uma nova reserva</h1>
<form action="" method="post">
    Carro a ser reservado: <br>
    <select name="select-carro">
        <?php foreach($lista_carro as $carro): ?>
        <option value="<?php echo $carro['id'] ?>"><?php echo $carro['nome'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    Data de Empréstimo:<br>
    <input type="text" name="txt-dataEmprestimo"><br><br>

    Data de Devolução:<br>
    <input type="text" name="txt-dataDevolucao"><br><br>

    Nome do Cliente:<br>
    <input type="text" name="txt-nomeCliente"><br><br>

    <input type="submit" value="Reserva Carro">
</form>
</body>
</html>