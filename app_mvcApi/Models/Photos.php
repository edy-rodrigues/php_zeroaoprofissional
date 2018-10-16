<?php
namespace Models;

use \Core\Model;

class Photos extends Model {

    public function getPhotosCount($id_user) {
        $sql = "SELECT COUNT(*) AS c FROM tb_photos WHERE id_user = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id_user);
        $sql->execute();
        $data = $sql->fetch();

        return $data['c'];
    }

}
?>