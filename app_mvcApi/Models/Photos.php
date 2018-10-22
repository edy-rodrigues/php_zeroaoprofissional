<?php
namespace Models;

use \Core\Model;

class Photos extends Model {

    public function getFeedCollection($list_users, $offset, $per_page) {
        $array = array();
        $Users = new Users();

        if(count($list_users) > 0) {
            $sql = "SELECT * FROM tb_photos 
            WHERE id_user IN(". implode(",", $list_users) .") 
            ORDER BY id DESC 
            LIMIT ". $offset .", ". $per_page;

            $sql = $this->db->query($sql);

            if($sql->rowCount() > 0) {
                $array = $sql->fetchAll(\PDO::FETCH_ASSOC);

                foreach($array as $k => $v) {
                    $user_info = $Users->getInfo($v['id_user']);
                    $array[$k]['name'] = $user_info['name'];
                    $array[$k]['avatar'] = $user_info['avatar'];
                    $array[$k]['url'] = BASE_URL.'media/photos/'.$v['url'];
                    $array[$k]['like_count'] = $this->getLikeCount($v['id']);

                    $array[$k]['comments'] = $this->getComments($v['id']);

                }
            }
        }

        return $array;
    }

    public function getPhoto($id_photo) {
        $array = array();
        $Users = new Users();

        $sql = "SELECT * FROM tb_photos WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id_photo);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch(\PDO::FETCH_ASSOC);

            $user_info = $Users->getInfo($array['id_user']);

            $array['name'] = $user_info['name'];
            $array['avatar'] = $user_info['avatar'];
            $array['url'] = BASE_URL.'media/photos/'.$array['url'];

            $array['like_count'] = $this->getLikeCount($array['id']);
            $array['comments'] = $this->getComments($array['id']);

        }

        return $array;
    }

    public function getRandomPhotos($per_page = 10, $excludes = array()) {
        $array = array();

        foreach ($excludes as $k => $item) {
            $excludes[$k] = intval($item);
        }

        if(count($excludes) > 0) {
            $sql = "SELECT * FROM tb_photos WHERE id NOT IN(". implode(',', $excludes) .") ORDER BY RAND() LIMIT ". $per_page;
        } else {
            $sql = "SELECT * FROM tb_photos ORDER BY RAND() LIMIT ". $per_page;
        }
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);

            foreach($array as $k => $v) {
                $array[$k]['url'] = BASE_URL.'media/photos/'.$v['url'];
                $array[$k]['like_count'] = $this->getLikeCount($v['id']);
                $array[$k]['comments'] = $this->getComments($v['id']);
            }
        }

        return $array;
    }

    public function getComments($id_photo) {
        $array = array();

        $sql = "SELECT pc.*, u.name FROM tb_photos_comments pc JOIN tb_users u ON u.id = pc.id_user WHERE pc.id_photo = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id_photo);
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $array;
    }

    public function getLikeCount($id_photo) {
        $sql = "SELECT COUNT(*) AS c FROM tb_photos_likes WHERE id_photo = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id_photo);
        $sql->execute();
        $data = $sql->fetch();

        return $data['c'];
    }

    public function getPhotosCount($id_user) {
        $sql = "SELECT COUNT(*) AS c FROM tb_photos WHERE id_user = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id_user);
        $sql->execute();
        $data = $sql->fetch();

        return $data['c'];
    }

    public function getPhotosFromUser($id_user, $offset = 0, $per_page = 10) {
        $array = array();

        $sql = "SELECT * FROM tb_photos WHERE id_user = :id ORDER BY id DESC LIMIT ". $offset .",". $per_page;
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id_user);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);

            foreach($array as $k => $v) {
                $array[$k]['url'] = BASE_URL.'media/photos/'.$v['url'];
                $array[$k]['like_count'] = $this->getLikeCount($v['id']);
                $array[$k]['comments'] = $this->getComments($v['id']);
            }
        }

        return $array;
    }

    public function deletePhoto($id_photo, $id_user) {
        $sql = "SELECT id FROM tb_photos WHERE id = :id AND id_user = :id_user";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id_photo);
        $sql->bindValue(":id_user", $id_user);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql = "DELETE FROM tb_photos_comments WHERE id_photo = :id_photo";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_photo", $id_photo);
            $sql->execute();

            $sql = "DELETE FROM tb_photos_likes WHERE id_photo = :id_photo";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_photo", $id_photo);
            $sql->execute();

            $sql = "DELETE FROM tb_photos WHERE id = :id_photo";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_photo", $id_photo);
            $sql->execute();

            return "";
        } else {
            return "Está foto não é do usuário correspondente";
        }
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

    public function addComment($id_photo, $id_user, $comment) {
        $sql = "INSERT INTO tb_photos_comments(id_user, id_photo, date_comment, comment) VALUES(:id_user, :id_photo, NOW(), :comment)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_user", $id_user);
        $sql->bindValue(":id_photo", $id_photo);
        $sql->bindValue(":comment", $comment);
        $sql->execute();

        return '';
    }

    public function deleteComment($id_comment, $id_user) {
        $sql = "SELECT id, id_photo, id_user FROM tb_photos_comments WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id_comment);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $id_photo = $sql['id_photo'];

            if($id_user == $sql['id_user']) {
                $sql = "DELETE FROM tb_photos_comments WHERE id = :id";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(":id", $id_comment);
                $sql->execute();

                return '';
            } else {
                $sql = "SELECT id FROM tb_photos WHERE id_user = :id_user AND id = :id_photo";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(":id_user", $id_user);
                $sql->bindValue(":id_photo", $id_photo);
                $sql->execute();

                if($sql->rowCount() > 0) {
                    $sql = "DELETE FROM tb_photos_comments WHERE id = :id";
                    $sql = $this->db->prepare($sql);
                    $sql->bindValue(":id", $id_comment);
                    $sql->execute();

                    return '';
                } else {
                    return 'Você não tem permissão para excluir este comentário. Está foto/comentário não é seu.';
                }
            }
            
        } else {
            return 'Foto não encontrada.';
        }
    }

    public function like($id_photo, $id_user) {
        $sql = "SELECT id FROM tb_photos_likes WHERE id_user = :id_user AND id_photo = :id_photo";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_user", $id_user);
        $sql->bindValue(":id_photo", $id_photo);
        $sql->execute();

        if($sql->rowCount() == 0) {
            $sql = "INSERT INTO tb_photos_likes(id_user, id_photo) VALUES(:id_user, :id_photo)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_user", $id_user);
            $sql->bindValue(":id_photo", $id_photo);
            $sql->execute();

            return '';
        } else {
            return 'Você já deu like nesta foto.';
        }
    }

    public function unlike($id_photo, $id_user) {
        $sql = "DELETE FROM tb_photos_likes WHERE id_user = :id_user AND id_photo = :id_photo";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_user", $id_user);
        $sql->bindValue(":id_photo", $id_photo);
        $sql->execute();

        return '';
    }

}
// Clemente Marton Segura, 240
?>