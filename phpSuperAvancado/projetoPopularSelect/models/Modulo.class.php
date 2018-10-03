<?php

class Modulo extends Model {
    public function getList() {
        $array = array();

        $sql = "SELECT * FROM tb_modulo";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}

?>