<?php
class Anuncio extends Model {

    public function getQuantidade() {
        $sql = "SELECT COUNT(*) AS c FROM tb_anuncio";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            return $sql['c'];
        } else {
            return 0;
        }
    }

}
?>