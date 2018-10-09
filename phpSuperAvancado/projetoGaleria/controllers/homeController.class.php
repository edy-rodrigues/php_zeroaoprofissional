<?php
class HomeController extends Controller {

    public function index() {
        $dados = array();

        $Imagem = new Imagem();
        $dados['imagem'] = $Imagem->getImagens();

        $this->loadTemplate('home', $dados);
    }

}
?>