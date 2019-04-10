<?php 

class contatoController extends Controller {

    public function index() {}

    public function add($error = "") {
        $dados = array(
            'error' => ''
        );

        if(isset($error) && !empty($error)) {
            $dados['error'] = "<br><div class='my error'>Usuário já existe com este e-mail!</div>";
        }
        
        if(isset($_POST['txt-email']) && !empty($_POST['txt-email'])) {
            $nome = addslashes($_POST['txt-nome']);
            $email = addslashes($_POST['txt-email']);

            $Contato = new Contato();
            if($Contato->add($nome, $email)) {
                header("Location: ". BASE_URL);
            } else {
                header("Location: ". BASE_URL."contato/add/error");
            }
        }

        $this->loadTemplate("add", $dados);
    }

    public function edit($id) {
        $dados = array();
        $Contato = new Contato();

        if(isset($_POST['txt-email']) && !empty($_POST['txt-email'])) {
            $nome = addslashes($_POST['txt-nome']);
            $email = addslashes($_POST['txt-email']);

            $Contato->update($id, $nome, $email);

            header("Location: ". BASE_URL. "contato/edit/". $id);
        }

        if(!empty($id)) {
            $dados['contato'] = $Contato->getOne($id);
        } else {
            header("Location: ". BASE_URL);
        }

        $this->loadTemplate("edit", $dados);
    }


    public function delete($id) {
        if(!empty($id)) {
            $Contato = new Contato();
            $Contato->delete($id);
        }

        header("Location: ". BASE_URL);
    }

}

?>