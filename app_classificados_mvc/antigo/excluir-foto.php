<?php
require_once "config.php";

if(empty($_SESSION['cLogin'])) {
    header("Location: login.php");
    exit;
}

require_once "classes/Anuncio.class.php";
$Anuncio = new Anuncio();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id_anuncio = $Anuncio->deletePhoto($_GET['id']);
}

if(isset($id_anuncio)) {
    header("Location: editar-anuncio.php?id=".$id_anuncio);
} else {
    header("Location: meus-anuncios.php");
}
?>