<?php
namespace Models;

use \Core\Model;

class User extends Model {
    public function isLogged() {
        if(isset($_SESSION['fbLogin']) && !empty($_SESSION['fbLogin'])) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $pass) {
        $sql = "SELECT id FROM tb_users WHERE email = :email AND pass = :pass";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email, \PDO::PARAM_STR);
        $sql->bindValue(":pass", $pass, \PDO::PARAM_STR);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $_SESSION['fbLogin'] = $sql['id'];
            header("Location: ". BASE_URL);
            exit;
        } else {
            return "Usuário e/ou senha estão incorretos!";
        }
    }

    public function sign_in($user) {
        if(!$this->emailExists($user['email'])) {
            $sql = "INSERT INTO tb_users(name, email, pass, gender, date_birthday) VALUES(:name, :email, :pass, :gender, :date_birthday)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":name", $user['name'], \PDO::PARAM_STR);
            $sql->bindValue(":email", $user['email'], \PDO::PARAM_STR);
            $sql->bindValue(":pass", $user['pass'], \PDO::PARAM_STR);
            $sql->bindValue(":gender", $user['gender'], \PDO::PARAM_STR);
            $sql->bindValue(":date_birthday", $user['date_birthday'], \PDO::PARAM_INT);
            $sql->execute();
    
            if($sql->rowCount() > 0) {
                $_SESSION['fbLogin'] = $this->db->lastInsertId();
                header("Location: ". BASE_URL);
                exit;
            } else {
                return "Não possível efetuar o cadastro !";
            }
        } else {
            return "Este e-mail já está cadastrado !";
        }
    }

    public function getInfo($id) {
        $array = array();

        $sql = "SELECT name, avatar FROM tb_users WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id, \PDO::PARAM_INT);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch(\PDO::FETCH_ASSOC);
        }

        return $array;
    }

    private function emailExists($email) {
        $sql = "SELECT id FROM tb_users WHERE email = :email";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email, \PDO::PARAM_STR);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}

?>