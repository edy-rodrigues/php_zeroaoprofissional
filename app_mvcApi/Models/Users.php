<?php
namespace Models;

use \Core\Model;
use \Models\Jwt;
use \Models\Photos;

class Users extends Model {

    private $id_user;

    public function create($name, $email, $pass) {
        if(!$this->emailExists($email)) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);

            $sql = "INSERT INTO tb_users(name, email, pass) VALUES(:name, :email, :pass)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":name", $name);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":pass", $hash);
            $sql->execute();

            $this->id_user = $this->db->lastInsertId();

            return true;
        } else {
            return false;
        }
    }

    public function checkCredentials($email, $pass) {
        $sql = "SELECT id, pass FROM tb_users WHERE email = :email";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $data = $sql->fetch();
            if(password_verify($pass, $data['pass'])) {
                $this->id_user = $data['id'];
                return true;
            } else if($pass == $data['pass']) {
                $this->id_user = $data['id'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getId() {
        return $this->id_user;
    }

    public function getInfo($id) {
        $array = array();

        $sql = "SELECT id, name, email, avatar FROM tb_users WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch(\PDO::FETCH_ASSOC);

            $Photos = new Photos;

            if(!empty($array['avatar'])) {
                $array['avatar'] = BASE_URL.'media/avatar/'. $array['avatar'];
            } else {
                $array['avatar'] = BASE_URL.'media/avatar/default.jpg';
            }

            $array['following'] = $this->getFollowingCount($id);
            $array['followers'] = $this->getFollowersCount($id);
            $array['photos_count'] = $Photos->getPhotosCount($id);
        }

        return $array;
    }

    public function editInfo($id, $data) {

        if($id === $this->getId()) {
            
            $toChange = array();

            if(!empty($data['name'])) {
                $toChange['name'] = $data['name'];
            }
            if(!empty($data['email'])) {
                if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    if(!$this->emailExists($data['email'])) {
                        $toChange['email'] = $data['email'];
                    } else {
                        return 'E-mail já existente';
                    }
                } else {
                    return 'Email inválido';
                }
            }
            if(!empty($data['pass'])) {
                $toChange['pass'] = password_hash($data['pass'], PASSWORD_DEFAULT);
            }

            if(count($toChange) > 0) {

                $fields = array();

                foreach ($toChange as $k => $v) {
                    $fields[] = $k.' = :'.$k;
                }

                $sql = "UPDATE tb_users SET ". implode(',', $fields) ." WHERE id = :id";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(":id", $id);
                foreach ($toChange as $k => $v) {
                    $sql->bindValue(":".$k, $v);
                }
                $sql->execute();

                return '';
            } else {
                return 'Não há dados a ser modificados';
            }
        } else {
            return 'Você não tem permissão para está ação';
        }
    }

    public function delete($id) {
        if($id === $this->getId()) {
            
            $Photos = new Photos();
            $Photos->deleteAll($id);

            $sql = "DELETE FROM tb_users_following WHERE id_user_active = :id OR id_user_passive = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();

            $sql = "DELETE FROM tb_users WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();

            return '';
        } else {
            return 'Você não tem permissão para está ação';
        }
    }

    public function getFeed($offset = 0, $per_page = 10) {
        $followingUsers = $this->getFollowing($this->getId());
        $Photos = new Photos();
        return $Photos->getFeedCollection($followingUsers, $offset, $per_page);
    }

    public function getFollowing($id_user) {
        $array = array();

        $sql = "SELECT id_user_passive FROM tb_users_following WHERE id_user_active = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id_user);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach($data as $item) {
                $array[] = intval($item['id_user_passive']);
            }
        }

        return $array;
    }

    public function getFollowingCount($id_user) {
        $sql = "SELECT COUNT(*) AS c FROM tb_users_following WHERE id_user_active = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id_user);
        $sql->execute();
        $data = $sql->fetch();

        return $data['c'];
    }

    public function getFollowersCount($id_user) {
        $sql = "SELECT COUNT(*) AS c FROM tb_users_following WHERE id_user_passive = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id_user);
        $sql->execute();
        $data = $sql->fetch();

        return $data['c'];
    }

    public function follow($id_user) {
        $sql = "SELECT * FROM tb_users_following WHERE id_user_active = :id_user_active AND id_user_passive = :id_user_passive";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_user_active", $this->getId());
        $sql->bindValue(":id_user_passive", $id_user);
        $sql->execute();

        if($sql->rowCount() === 0) {
            $sql = "INSERT INTO tb_users_following(id_user_active, id_user_passive) VALUES(:id_user_active, :id_user_passive)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_user_active", $this->getId());
            $sql->bindValue(":id_user_passive", $id_user);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function unfollow($id_user) {
        $sql = "DELETE FROM tb_users_following WHERE id_user_active = :id_user_active AND id_user_passive = :id_user_passive";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_user_active", $this->getId());
        $sql->bindValue(":id_user_passive", $id_user);
        $sql->execute();
    }

    public function createJWT() {
        $Jwt = new Jwt();
        return $Jwt->create(array('id_user' => $this->id_user));
    }

    public function validateJWT($token) {
        $Jwt = new Jwt();
        $data = $Jwt->validate($token);

        if(isset($data->id_user)) {
            $this->id_user = $data->id_user;
            return true;
        } else {
            return false;
        }
    }

    private function emailExists($email) {
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

}

?>