<?php

function calcularCadastros($id, $limite) {
    $lista = [];
    global $db;

    $sql = $db->prepare("SELECT * FROM tb_usuario u WHERE u.fk_pai = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();
    $filhos = 0;

    if($sql->rowCount() > 0) {
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);

        $filhos = $sql->rowCount();

        foreach ($lista as $chave => $usuario) {
            if($limite > 0) {
                $filhos += calcularCadastros($usuario['id'], $limite - 1);
            }
        }
    }

    return $filhos;
}


function listar($id, $limite) {
    $lista = [];
    global $db;

    $sql = $db->prepare("SELECT
    u.id, u.fk_pai, u.fk_patente, u.nome, t.nome as p_nome
    FROM tb_usuario u 
    LEFT JOIN tb_patente t ON t.id = u.fk_patente
    WHERE u.fk_pai = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($lista as $chave => $usuario) {
            $lista[$chave]['filhos'] = [];
            if($limite > 0) {
                $lista[$chave]['filhos'] = listar($usuario['id'], $limite - 1);
            }
        }
    }

    return $lista;
}

function exibir($array) {
    echo '<ul>';
    foreach ($array as $usuario) {
        echo '<li>';
        echo $usuario['nome'].' ('.utf8_encode($usuario['p_nome']).')';

        if (count($usuario['filhos']) > 0) {
            exibir($usuario['filhos']);
        }

        echo '</li>';
    }
    echo '</ul>';
}

?>