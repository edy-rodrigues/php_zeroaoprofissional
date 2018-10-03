<?php
class HomeController extends Controller {

    public function index() {
        $dados = array();

        $Galeria = new Galeria();
        
        $Galeria->saveFotos();
        $dados['fotos'] = $Galeria->getFotos();

        $this->loadTemplate('home', $dados);
    }

}
?>