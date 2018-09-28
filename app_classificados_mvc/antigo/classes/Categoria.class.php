<?php

class Categoria {
    public function readAll() {
        global $pdo;
        $array = [];

        $sql = "SELECT * FROM tb_categoria";
        $sql = $pdo->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}

?>