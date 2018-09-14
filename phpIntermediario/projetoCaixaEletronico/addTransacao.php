<?php
session_start();
require_once 'conexao.php';
if(isset($_POST['select-tipo'])) {
    $tipo = $_POST['select-tipo'];
    $valor = floatval(str_replace(",", ".", $_POST['txt-valor']));

    $sql = "INSERT INTO tb_historico (fk_conta, tipo, valor, data_operacao) VALUES (:id_conta, :tipo, :valor, NOW())";
    $sql = $db->prepare($sql);
    $sql->bindValue(":id_conta", $_SESSION['banco']);
    $sql->bindValue(":tipo", $tipo);
    $sql->bindValue(":valor", $valor);
    $sql->execute();

    if ( $tipo == 0 ) {
        // Depósito
        $sql = "UPDATE tb_conta SET saldo = saldo + :valor WHERE id = :id";
        $sql = $db->prepare($sql);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":id", $_SESSION['banco']);
        $sql->execute();
    } else {
        // Saque
        $sql = "UPDATE tb_conta SET saldo = saldo - :valor WHERE id = :id";
        $sql = $db->prepare($sql);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":id", $_SESSION['banco']);
        $sql->execute();
    }

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transação</title>
</head>
<body>
<form method="POST">
    Tipo de transação: <br>
    <select name="select-tipo">
        <option value="0">Depósito</option>
        <option value="1">Saque</option>
    </select><br><br>
    Valor: <br/>
    <input type="text" name="txt-valor" pattern="[0-9.,]{1,}"><br/><br/>

    <input type="submit" value="Depósito/Saque">
</form>
</body>
</html>