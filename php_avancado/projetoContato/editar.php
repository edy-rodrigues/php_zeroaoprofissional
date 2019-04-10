<?php

require_once "Contato.class.php";
$contato = new Contato();

if ( !empty( $_GET['id'] ) ) {
    $id = $_GET['id'];

    $dados = $contato->get($id);

    if ( empty( $dados['email'] ) ) {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
    exit;
}

if ( isset( $_POST['txt-nome'] ) ) {
    $nome = $_POST['txt-nome'];

    $contato->editar($id, $nome);

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
    <title>Editar Perfil</title>
</head>
<body>

<h2>Editar Perfil</h2>
<form method="POST">

    Nome: <br>
    <input type="text" name="txt-nome" value=" <?php echo $dados['nome'] ?> "><br><br>

    E-mail: <br>
    <input type="text" name="txt-nome" value=" <?php echo $dados['email'] ?> " disabled><br><br>

    <input type="submit" value="Salvar">

</form>

</body>
</html>