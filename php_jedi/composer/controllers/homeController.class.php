<?php

class homeController extends Controller {
    public function index() {
        $dados = array();

        $this->loadTemplate("home", $dados);
    }
}

?>