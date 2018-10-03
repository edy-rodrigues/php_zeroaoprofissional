<?php

class Notificacao extends Model {
    public function getNotificationNoVisualized() {
        $qt = 0;

        $sql = "SELECT * FROM tb_notificacao WHERE id_user = 1 AND visualized = 0";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $qt = $sql->rowCount();
        }

        return $qt;
    }

    public function add() {
        $prop = array(
            'curtidor' => '2',
            'id_foto' => '123'
        );

        $sql = "INSERT INTO tb_notificacao(id_user, type, properties, link) VALUES(:id_user, :type, :prop, :url)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_user", 1);
        $sql->bindValue(":type", "curtida");
        $sql->bindValue(":prop", json_encode($prop));
        $sql->bindValue(":url", "http://phpzeroaoprofissional.pc:8080/phpSuperAvancado/projetoNotificacao/home");
        $sql->execute();
    }
}

?>