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