<?php

class Post extends Model {
    public function getList($offset, $perPage) {
        $array = array();

        $sql = "SELECT * FROM tb_post LIMIT $offset, $perPage";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function count() {
        $sql = "SELECT COUNT(*) AS c FROM tb_post";
        $sql = $this->db->query($sql);
        $sql = $sql->fetch();

        return $sql['c'];
    }
}

?>