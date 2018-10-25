<?php
namespace Models;

use \Core\Model;

class User extends Model {

    private $id;

    public function __construct($id = null) {
        parent::__construct();
        if(!empty($id)) {
            $this->id = intval($id);
        }
    }

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
        
        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function newUser($name, $email, $pass) {
        $sql = "INSERT INTO tb_users(name, email, pass) VALUES(:name, :email, :pass)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":name", $name, \PDO::PARAM_STR);
        $sql->bindValue(":email", $email, \PDO::PARAM_STR);
        $sql->bindValue(":pass", $pass, \PDO::PARAM_STR);
        $sql->execute();

        $_SESSION['twLogin'] = $this->db->lastInsertId();
    }

    public function login($email, $pass) {
        $sql = "SELECT id FROM tb_users WHERE email = :email AND pass = :pass";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email, \PDO::PARAM_STR);
        $sql->bindValue(":pass", $pass, \PDO::PARAM_STR);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch(\PDO::FETCH_ASSOC);
            $_SESSION['twLogin'] = $sql['id'];
            return true;
        } else {
            return false;
        }
    }

    public function getName($id_user = '') {
        if(!empty($this->id)) {
            if(empty($id_user)) {
                $id_user = $this->id;
            }

            $sql = "SELECT name FROM tb_users WHERE id = :id_user";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_user", $id_user, \PDO::PARAM_INT);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $sql = $sql->fetch(\PDO::FETCH_ASSOC);

                return $sql['name'];
            }
        }
    }

    public function countFollowed() {
        $sql = "SELECT COUNT(id_user_passive) AS qt FROM tb_following WHERE id_user_passive = :id_user_passive";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_user_passive", $this->id, \PDO::PARAM_INT);
        $sql->execute();
        $sql = $sql->fetch(\PDO::FETCH_ASSOC);
        
        return $sql['qt'];
    }

    public function countFollowing() {
        $sql = "SELECT COUNT(id_user_active) AS qt FROM tb_following WHERE id_user_active = :id_user_active";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_user_active", $this->id);
        $sql->execute();
        $sql = $sql->fetch(\PDO::FETCH_ASSOC);
        
        return $sql['qt'];
    }

    public function getUsers($limit) {
        $array = array();

        if(!empty($this->id)) {
            $sql = "SELECT u.id, u.name
            FROM tb_users u
            WHERE u.id != :id_user AND u.id NOT IN (SELECT f.id_user_passive FROM tb_following f WHERE f.id_user_active = :id_user) LIMIT ". $limit;
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_user", $this->id, \PDO::PARAM_INT);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
            }

            return $array;
        }
    }
}