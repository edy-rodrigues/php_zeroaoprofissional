<?php

require_once "conexao.php";

if(isset($_GET['txt-campo']) && !empty($_GET['txt-campo'])) {
    $campo = $_GET['txt-campo'];

    $sql = "SELECT * FROM tb_usuario WHERE (email = :email OR cpf = :cpf OR nome = :nome)";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":email", $campo);
    $sql->bindValue(":cpf", $campo);
    $sql->bindValue(":nome", $campo);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $data = $sql->fetch();

        echo "Usuário encontrado: ". $data['nome'];
        echo "<br><br><a href='index.php'>Voltar a pesquisa !</a>";
        exit;
    } else {
        echo "Nenhum usuário encontrado!";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto Pesquisa em Várias Colunas</title>
</head>
<body>
<h1>Digite E-mail ou CPF do Usuário</h1>
<form action="" method="get">
    <input type="text" name='txt-campo'>
    <input type="submit" value='Pesquisar'>
</form>
</body>
</html>