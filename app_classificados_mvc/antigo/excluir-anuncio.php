<?php
require_once "config.php";

if(empty($_SESSION['cLogin'])) {
    header("Location: login.php");
    exit;
}

require_once "classes/Anuncio.class.php";
$Anuncio = new Anuncio();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $Anuncio->delete($_GET['id']);
}
header("Location: meus-anuncios.php");
?>