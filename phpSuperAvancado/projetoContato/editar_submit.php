<?php

require_once "Contato.class.php";
$contato = new Contato();

if ( !empty( $_GET['id'] ) ) {
    $id = $_GET['id'];

    $dados = $contato->get($id);
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