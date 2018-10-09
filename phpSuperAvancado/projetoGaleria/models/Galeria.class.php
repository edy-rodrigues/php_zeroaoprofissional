<?php

class Galeria extends Model {

    public function getFotos() {
        $array = array();

        $sql = "SELECT * FROM tb_galeria ORDER BY id DESC";
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function saveFotos() {
        if(isset($_FILES['file']) && !empty($_FILES['file']['tmp_name'])) {
            $permitidos = array("image/jpg", "image/jpeg", "image/png");

            if(in_array($_FILES['file']['type'], $permitidos)) {
                $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $name_file = md5(time().rand(0, 999)).".".$extension;

                move_uploaded_file($_FILES['file']['tmp_name'], 'assets/images/galeria/'.$name_file);

                $titulo = '';

                if(isset($_POST['txt-titulo']) && !empty($_POST['txt-titulo'])) {
                    $titulo = addslashes($_POST['txt-titulo']);
                }

                $sql = "INSERT INTO tb_galeria(titulo, url) VALUES('$titulo', '$name_file')";
                $this->db->query($sql);
            }
        }
    }
}

?>