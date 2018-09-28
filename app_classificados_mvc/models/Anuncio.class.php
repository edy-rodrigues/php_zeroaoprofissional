<?php

class Anuncio extends Model {

    public function getTotalAnuncioFiltrado($filtros) {

        $filtrostring = ['1=1'];
        if(!empty($filtros['categoria'])) {
            $filtrostring[] = "tb_anuncio.id_categoria = :id_categoria";
        }
        if(!empty($filtros['preco'])) {
            $preco = explode("-", $filtros['preco']);
            if(count($preco) > 1) {
                $filtrostring[] = "tb_anuncio.valor BETWEEN :preco1 AND :preco2";
            } else {
                $filtrostring[] = "tb_anuncio.valor >= :preco";
            }
        }
        if($filtros['estado'] != "") {
            $filtrostring[] = "tb_anuncio.estado = :estado";
        }
        $sql = "SELECT COUNT(*) AS c FROM tb_anuncio WHERE ". implode(' AND ', $filtrostring) ."";
        $sql = $this->db->prepare($sql);
        if(!empty($filtros['categoria'])) {
            $sql->bindValue(':id_categoria', $filtros['categoria']);
        }
        if(!empty($filtros['preco'])) {
            $preco = explode('-', $filtros['preco']);
            if(count($preco) > 1) {
                $sql->bindValue(':preco1', $preco[0]);
                $sql->bindValue(':preco2', $preco[1]);
            } else {
                $sql->bindValue(':preco', $preco[0]);
            }
        }
        if($filtros['estado'] != "") {
            $sql->bindValue(':estado', $filtros['estado']);
        }
        $sql->execute();
        $sql = $sql->fetch();

        return $sql['c'];
    }

    public function getTotalAnuncio() {

        $sql = "SELECT COUNT(*) AS c FROM tb_anuncio";
        $sql = $this->db->query($sql);
        $sql = $sql->fetch();

        return $sql['c'];
    }

    public function getUltimosAnuncios($page, $perPage, $filtros) {

        $offset = ($page - 1) * $perPage;

        $array = [];

        $filtrostring = ['1=1'];
        if(!empty($filtros['categoria'])) {
            $filtrostring[] = "tb_anuncio.id_categoria = :id_categoria";
        }
        if(!empty($filtros['preco'])) {
            $preco = explode("-", $filtros['preco']);
            if(count($preco) > 1) {
                $filtrostring[] = "tb_anuncio.valor BETWEEN :preco1 AND :preco2";
            } else {
                $filtrostring[] = "tb_anuncio.valor >= :preco";
            }
        }
        if($filtros['estado'] != "") {
            $filtrostring[] = "tb_anuncio.estado = :estado";
        }

        $sql = $this->db->prepare("SELECT *, (SELECT tb_anuncio_imagem.url FROM tb_anuncio_imagem WHERE tb_anuncio_imagem.id_anuncio = tb_anuncio.id limit 1) AS url, (SELECT tb_categoria.nome FROM tb_categoria WHERE tb_categoria.id = tb_anuncio.id_categoria) AS categoria FROM tb_anuncio WHERE ". implode(' AND ', $filtrostring) ." ORDER BY id DESC LIMIT $offset, $perPage");
        if(!empty($filtros['categoria'])) {
            $sql->bindValue(':id_categoria', $filtros['categoria']);
        }
        if(!empty($filtros['preco'])) {
            $preco = explode('-', $filtros['preco']);
            if(count($preco) > 1) {
                $sql->bindValue(':preco1', $preco[0]);
                $sql->bindValue(':preco2', $preco[1]);
            } else {
                $sql->bindValue(':preco', $preco[0]);
            }
        }
        if($filtros['estado'] != "") {
            $sql->bindValue(':estado', $filtros['estado']);
        }
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function readAll() {
        $array = [];

        $sql = $this->db->prepare("SELECT *, (SELECT tb_anuncio_imagem.url FROM tb_anuncio_imagem WHERE tb_anuncio_imagem.id_anuncio = tb_anuncio.id limit 1) AS url FROM tb_anuncio WHERE id_usuario = :id_usuario");
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function readOne($id) {
        $array = [];

        $sql = $this->db->prepare("SELECT *, (SELECT tb_categoria.nome FROM tb_categoria WHERE tb_categoria.id = tb_anuncio.id_categoria) AS categoria, (SELECT tb_usuario.telefone FROM tb_usuario WHERE tb_usuario.id = tb_anuncio.id_usuario) AS telefone FROM tb_anuncio WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
            $array['fotos'] = [];

            $sql = "SELECT id, url FROM tb_anuncio_imagem WHERE id_anuncio = :id_anuncio";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_anuncio", $id);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $array['fotos'] = $sql->fetchAll();
            }
        }

        return $array;
    }

    public function create($titulo, $categoria, $valor, $descricao, $estado) {

        $sql = "INSERT INTO tb_anuncio(id_usuario, id_categoria, titulo, descricao, valor, estado) VALUES(:id_usuario, :id_categoria, :titulo, :descricao, :valor, :estado)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->bindValue(":id_categoria", $categoria);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":estado", $estado);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $titulo, $categoria, $valor, $descricao, $estado, $fotos) {

        $sql = "UPDATE tb_anuncio SET titulo = :titulo, id_usuario = :id_usuario, id_categoria = :id_categoria, valor = :valor, descricao = :descricao, estado = :estado WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->bindValue(":id_categoria", $categoria);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":estado", $estado);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if(count($fotos) > 0) {
            for ($i=0; $i < count($fotos['tmp_name']); $i++) { 
                $tipo = $fotos['type'][$i];
                if(in_array($tipo, array('image/jpeg', 'image/png'))) {
                    $temp_name = md5(time().rand(0, 999)).'.jpg';
                    move_uploaded_file($fotos['tmp_name'][$i], 'assets/img/anuncios/'.$temp_name);

                    list($width_orig, $height_orig) = getimagesize('assets/img/anuncios/'.$temp_name);
                    $ratio = $width_orig / $height_orig;

                    $width = 500;
                    $height = 500;

                    if($width/$height > $ratio) {
                        $width = $height * $ratio;
                    } else {
                        $height = $width / $ratio;
                    }

                    $img = imagecreatetruecolor($width, $height);
                    if($tipo == 'image/jpeg') {
                        $img_orig = imagecreatefromjpeg('assets/img/anuncios/'.$temp_name);
                    } else if($tipo == 'image/png') {
                        $img_orig = imagecreatefrompng('assets/img/anuncios/'.$temp_name);
                    }

                    imagecopyresampled($img, $img_orig, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

                    imagejpeg($img, 'assets/img/anuncios/'.$temp_name, 80);

                    $sql = "INSERT INTO tb_anuncio_imagem(id_anuncio, url) VALUES(:id_anuncio, :url)";
                    $sql = $this->db->prepare($sql);
                    $sql->bindValue(":id_anuncio", $id);
                    $sql->bindValue(":url", $temp_name);
                    $sql->execute();
                }
            }
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM tb_anuncio_imagem WHERE id_anuncio = :id_anuncio";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_anuncio", $id);
        $sql->execute();

        $sql = "DELETE FROM tb_anuncio WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function deletePhoto($id) {

        $id_anuncio = 0;

        $sql = "SELECT id_anuncio FROM tb_anuncio_imagem WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $id_anuncio = $sql['id_anuncio'];
        }

        $sql = "DELETE FROM tb_anuncio_imagem WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return $id_anuncio;
    }

}

?>