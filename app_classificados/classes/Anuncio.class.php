<?php

class Anuncio {

    public function readAll() {
        global $pdo;
        $array = [];

        $sql = $pdo->prepare("SELECT *, (SELECT tb_anuncio_imagem.url FROM tb_anuncio_imagem WHERE tb_anuncio_imagem.id_anuncio = tb_anuncio.id limit 1) AS url FROM tb_anuncio WHERE id_usuario = :id_usuario");
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function create($titulo, $categoria, $valor, $descricao, $estado) {
        global $pdo;

        $sql = "INSERT INTO tb_anuncio(id_usuario, id_categoria, titulo, descricao, valor, estado) VALUES(:id_usuario, :id_categoria, :titulo, :descricao, :valor, :estado)";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->bindValue(":id_categoria", $categoria);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":estado", $estado);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

}

?>