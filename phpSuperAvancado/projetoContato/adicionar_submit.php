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