<?php
class produtoController extends Controller {

    public function index() {

    }

    public function abrir($id) {
        $dados = array();

        $Anuncio = new Anuncio();
        $Usuario = new Usuario();

        if(empty($id)) {
            header("Location: ". BASE_URL);
            exit;
        }

        $anuncio = $Anuncio->readOne($id);

        $dados['anuncio'] = $anuncio;

        $this->loadTemplate('produto', $dados);
    }

}
?>