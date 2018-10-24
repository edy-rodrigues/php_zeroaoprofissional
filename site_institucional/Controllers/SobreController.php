<?php
namespace Controllers;

use \Core\Controller;

class SobreController extends Controller {

    public function index() {
        $data = array();

        $this->loadTemplate('sobre', $data);
    }

}
?>