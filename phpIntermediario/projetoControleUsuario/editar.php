<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Usuário</title>
</head>
<body>
<?php
require_once "conexao.php";

$id = 0;
if(isset($_GET['id']) && empty($_GET['id']) == false) {
    $id = addslashes($_GET['id']);
}

if(isset($_POST['txt-nome']) && empty($_POST['txt-nome']) == false) {
    $nome = addslashes($_POST['txt-nome']);
    $email = addslashes($_POST['txt-email']);

    $sql = "UPDATE tb_usuario SET nome = '$nome', email = '$email' WHERE id = '$id'";
    $pdo->query($sql);

    header("Location: index.php");
}

$sql = "SELECT * FROM tb_usuario WHERE id = '$id'";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0) {
    $usuario = $sql->fetch();
} else {
    header("Location: index.php");
}

?>

<form method="POST">
    Nome: <br/>
    <input type="text" name="txt-nome" value="<?php echo $usuario['nome']; ?>" /><br/>
    E-mail: <br/>
    <input type="email" name="txt-email" value="<?php echo $usuario['email']; ?>" /><br/>
    <input type="submit" value="Atualizar">
</form>

</body>
</html>