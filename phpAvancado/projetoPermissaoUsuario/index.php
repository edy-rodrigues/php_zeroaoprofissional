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

$documento = new Documento($pdo);
$lista_documento = $documento->listarTodos();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página Inicial</title>
    <style>
        table th, table td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<h1>Sistema de Documentos</h1>

<?php if($usuario->verificaPermissao('ADD')): ?>
<a href="adicionar.php">Adicionar Novo Documento</a><br><br>
<?php endif; ?>

<?php if($usuario->verificaPermissao('SECRET')): ?>
<a href="secreto.php">Página Secreta</a>
<?php endif; ?>

<h3>Lista de Documentos</h3>

<table>
    <th>Código do Documento</th>
    <th>Titulo</th>
    <th colspan="2">Ações</th>
    <?php

    foreach ($lista_documento as $documento): ?>
        <tr>
            <td><?php echo $documento['id'] ?></td>
            <td><?php echo utf8_encode($documento['titulo']) ?></td>
            <?php if($usuario->verificaPermissao('EDIT')): ?>
            <td><a href="editar?id=<?php echo $documento['id'] ?>">[ Editar ]</a></td>
            <?php endif; ?>
            <?php if($usuario->verificaPermissao('DEL')): ?>
            <td><a href="excluir?id=<?php echo $documento['id'] ?>">[ Excluir ]</a></td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>