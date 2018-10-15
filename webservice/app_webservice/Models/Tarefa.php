<?php
namespace Models;
use Core\Model;

class Tarefa extends Model {
    
    public function listar() {
        $array = array();

        $sql = "SELECT * FROM tb_tarefa";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function addTarefa($titulo) {
        $sql = "INSERT INTO tb_tarefa(titulo) VALUES(:titulo)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":titulo", $titulo);
        $sql->execute();
    }

    public function delTarefa($id) {
        $sql = "DELETE FROM tb_tarefa WHERE id = '$id'";
        $this->db->query($sql);
    }

    public function updateStatus($id, $status) {
        $sql = "UPDATE tb_tarefa SET status = '$status' WHERE id = '$id'";
        $this->db->query($sql);
    }
}
?>