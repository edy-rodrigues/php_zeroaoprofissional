<?php
require_once "jwt.php";

$jwt = new JWT();

if(!empty($_GET['token'])) {
    $token = $_GET['token'];
    if($data = $jwt->validate($token)) {
        echo "Meu nome é: ". $data->nome. " - ". $data->id_user;
    } else {
        echo "Token Inválido";
    }
} else {
    echo "Token não enviado";
}

// echo "Meu nome: ". $nome;
?>