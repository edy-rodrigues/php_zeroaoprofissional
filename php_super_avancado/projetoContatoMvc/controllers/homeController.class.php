<?php
class HomeController extends Controller {

    public function index() {
        $dados = array();

        $Contato = new Contato();
        $dados['lista'] = $Contato->getAll();

        $this->loadTemplate('home', $dados);
    }

}
?>