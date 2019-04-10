<?php
class Usuario extends Model {

    public function getNome() {
        return "Edinei";
    }

    public function getIdade() {
        return rand(15, 30);
    }

}
?>