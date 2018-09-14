<?php
session_start();
require_once "conexao.php";
require_once "functions.php";

$sql = "SELECT id FROM tb_usuario";
$sql = $db->query($sql);
$usuarios = [];

if ($sql->rowCount() > 0) {
    $usuarios = $sql->fetchAll();
    foreach($usuarios as $chave => $usuario) {
        $usuarios[$chave]['filhos'] = calcularCadastros($usuario['id'], $limite);
    }
}

$sql = "SELECT * FROM tb_patente ORDER BY criterio DESC";
$sql = $db->query($sql);
if ( $sql->rowCount() > 0 ) {
    $patentes = $sql->fetchAll();
}

foreach ($usuarios as $usuario) {
    
    foreach ($patentes as $patente) {
        if ( intval($usuario['filhos']) >= intval($patente['criterio']) ) {

            $sql = "UPDATE tb_usuario SET fk_patente = :patente WHERE id = :id";
            $sql = $db->prepare($sql);
            $sql->bindValue(":patente", $patente['id']);
            $sql->bindValue(":id", $usuario['id']);
            $sql->execute();
            break;

        }
    }

}

?>