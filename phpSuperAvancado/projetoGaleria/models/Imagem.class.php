<?php

class Imagem extends Model {

    public function getImagens() {
        $array = array();

        $sql = "SELECT * FROM tb_imagem";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

}

?>