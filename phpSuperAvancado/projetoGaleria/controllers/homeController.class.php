<?php
class HomeController extends Controller {

    public function index() {
        $dados = array();

<<<<<<< HEAD
        $Imagem = new Imagem();
        $dados['imagem'] = $Imagem->getImagens();
=======
        $Galeria = new Galeria();
        
        $Galeria->saveFotos();
        $dados['fotos'] = $Galeria->getFotos();
>>>>>>> 3dd44e489553d3ea1c02ed8f979a3ace252e3c9c

        $this->loadTemplate('home', $dados);
    }

}
?>