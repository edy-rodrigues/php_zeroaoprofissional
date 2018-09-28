<?php

class Categoria extends Model {
    public function readAll() {
        $array = [];

        $sql = "SELECT * FROM tb_categoria";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}

?>