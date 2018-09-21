<?php
session_start();

require_once "conexao.php";
require_once "classes/Usuario.class.php";
require_once "classes/Documento.class.php";

if(!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}

$usuario = new Usuario($pdo);
$usuario->setUsuario($_SESSION['logado']);

if(!$usuario->verificaPermissao('SECRET')) {
    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página Secreta</title>
</head>
<body>
<h1>Página Secreta</h1>
</body>
</html>