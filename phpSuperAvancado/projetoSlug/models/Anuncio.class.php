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

    public function getList() {
        $array = array();

        $sql = "SELECT * FROM tb_anuncio";
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getOneSlug($slug) {
        $sql = "SELECT * FROM tb_anuncio WHERE slug = :slug";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":slug", $slug);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
        } else {
            $sql = "Não possível encontrar nenhum album";
        }

        return $sql;
    }

}
?>