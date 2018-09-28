<?php
class galeriaController extends Controller {

    public function index() {
        $dados = array(
            'qt' => 129
        );

        $this->loadTemplate("galeria", $dados);
    }

}
?>