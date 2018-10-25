<?php
namespace Models;

use \Core\Model;

class Following extends Model {
    public function follow($id_user_active, $id_user_passive) {
        $sql = "INSERT INTO tb_following(id_user_active, id_user_passive) VALUES(:id_user_active, :id_user_passive)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_user_active", $id_user_active);
        $sql->bindValue(":id_user_passive", $id_user_passive);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function unfollow($id_user_active, $id_user_passive) {
        $sql = "DELETE FROM tb_following WHERE id_user_active = :id_user_active AND id_user_passive = :id_user_passive";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_user_active", $id_user_active);
        $sql->bindValue(":id_user_passive", $id_user_passive);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}