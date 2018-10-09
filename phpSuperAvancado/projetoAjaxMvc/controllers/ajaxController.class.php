<?php

class ajaxController extends Controller {

    public function index() {
        $dados = array();

        if(isset($_POST['txt-nome']) && !empty($_POST['txt-nome'])) {
            $dados['nome'] = $_POST['txt-nome'];
        }

        $this->loadView('ajax', $dados);
    }

}

?>