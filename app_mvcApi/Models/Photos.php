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

    public function deleteAll($id_user) {
        $sql = "DELETE FROM tb_photos_comments WHERE id_user = :id_user";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_user", $id_user);
        $sql->execute();

        $sql = "DELETE FROM tb_photos_likes WHERE id_user = :id_user";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_user", $id_user);
        $sql->execute();

        $sql = "DELETE FROM tb_photos WHERE id_user = :id_user";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_user", $id_user);
        $sql->execute();
    }

}
?>