<?php
require_once "conexao.php";

if(!empty($_GET['id']) && !empty($_GET['voto'])) {
    $id = intval($_GET['id']);
    $voto = intval($_GET['voto']);

    if($voto > 0 && $voto < 6) {
        $sql = "INSERT INTO tb_voto(fk_filme, nota) VALUES(:id_filme, :nota)";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id_filme", $id);
        $sql->bindValue(":nota", $voto);
        $sql->execute();

        $sql = "UPDATE tb_filme f SET media = (SELECT (SUM(nota)/COUNT(*)) FROM tb_voto v WHERE v.fk_filme = f.id) WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        header("Location: index.php");
        exit;
    }
}

?>