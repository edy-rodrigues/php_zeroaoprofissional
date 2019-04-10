<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto Comentários</title>
</head>
<body>

<?php

require_once "conexao.php";

if(isset($_POST['txt-nome']) && !empty($_POST['txt-nome'])) {
    $nome = $_POST['txt-nome'];
    $msg = $_POST['txt-msg'];

    $sql = $db->prepare("INSERT INTO tb_comentario SET nome = :nome, msg = :msg, data_msg = NOW()");
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":msg", $msg);
    $sql->execute();
}

?>

<fieldset>
    <form method="POST">
        Nome: <br/>
        <input type="text" name="txt-nome"><br/><br/>
        Mensagem: <br/>
        <textarea name="txt-msg" cols="30" rows="10"></textarea><br/><br/>
        <input type="submit" value="Enviar Mensagem">
        <input type="reset" value="Apagar Dados">
    </form>
</fieldset>
<br/>

<?php

$sql = "SELECT * FROM tb_comentario ORDER BY data_msg DESC";
$sql = $db->query($sql);

if($sql->rowCount() > 0) {
    foreach ($sql->fetchAll() as $mensagem):
    ?>
        <h3><strong><?php echo $mensagem['nome']; ?></strong></h3>
        <p><?php echo $mensagem['msg']; ?></p>
        <hr/>
    <?php
    endforeach;
} else {
    echo "Não há comentários!";
}
?>

</body>
</html>