<?php
namespace Models;

use \Core\Model;

class User extends Model {
    public function isLogged() {
        if(isset($_SESSION['twLogin']) && !empty($_SESSION['twLogin'])) {
            return true;
        } else {
            return false;
        }
    }

    public function emailExists($email) {
        $sql = "SELECT id FROM tb_users WHERE email = :email";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();
        
        if($sql->rowCont() > 0) {
            return true;
        } else {
            return false;
        }
    }
}