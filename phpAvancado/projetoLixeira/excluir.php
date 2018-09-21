<?php
require_once "conexao.php";
require_once "classes/Documento.class.php";

$documento = new Documento($pdo);


if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);

    $documento->excluir($id);
}
header("Location: index.php");
exit;
?>