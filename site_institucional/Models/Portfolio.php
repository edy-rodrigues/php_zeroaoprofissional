<?php
namespace Models;

use \Core\Model;

class Portfolio extends Model {
    public function getPortfolio($qt = '') {
        $array = array();

        $sql = "SELECT * FROM tb_portfolio ";
        if(!empty($qt)) {
            $sql .= "LIMIT ". $qt;
        }
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}