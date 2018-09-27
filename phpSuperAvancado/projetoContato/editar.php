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
?>
<h2>Editar Perfil</h2>
<form action="editar_submit.php?id=<?php echo $id ?>" method="POST">

    Nome: <br>
    <input type="text" name="txt-nome" value=" <?php echo $dados['nome'] ?> "><br><br>

    E-mail: <br>
    <input type="text" name="txt-nome" value=" <?php echo $dados['email'] ?> " disabled><br><br>

    <input type="submit" value="Salvar">

</form>