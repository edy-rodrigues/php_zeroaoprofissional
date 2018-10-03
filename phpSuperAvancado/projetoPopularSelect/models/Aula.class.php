<?php

class Aula extends Model {

    public function getList($id_modulo) {
        $array = array();

        $sql = "SELECT * FROM tb_aula WHERE id_modulo = :id_modulo";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_modulo", $id_modulo);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

} 

?>