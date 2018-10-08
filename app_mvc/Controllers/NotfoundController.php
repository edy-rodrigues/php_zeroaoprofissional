<?php
namespace Controller;

use \Core\Controller;

class notfoundController extends Controller {

    public function index() {
        $this->loadView("404", array());
    }

}

?>