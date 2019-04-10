<?php

require_once 'Contato.class.php';

$contato = new Contato();

if(isset($_POST['txt-email']) && !empty($_POST['txt-email'])) {
    $email = $_POST['txt-email'];
    $nome = $_POST['txt-nome'];
    
    $contato->add($email, $nome);

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
    <title>Adicionar Contato</title>
</head>
<body>

<h2>Adicionar Contato</h2>
<form method="POST">
    Nome: <br>
    <input type="text" name="txt-nome"><br><br>
    E-mail: <br>
    <input type="email" name="txt-email"><br><br>
    <input type="submit" value="Adicionar">
</form>

</body>
</html>