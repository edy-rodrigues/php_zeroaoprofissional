<?php
class HomeController extends Controller {

    public function index() {
        $Anuncio = new Anuncio();
        $Usuario = new Usuario();

        $dados = array(
            'qtde' => $Anuncio->getQuantidade(),
            'nome' => $Usuario->getNome(),
            'idade' => $Usuario->getIdade()
        );

        $this->loadTemplate('home', $dados);
    }

}
?>