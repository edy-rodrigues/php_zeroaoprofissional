<?php
namespace Controllers;

use \Core\Controller;

class ServicosController extends Controller {

    public function index() {
        $data = array();

        $this->loadTemplate('servicos', $data);
    }

}
?>