<?php

class ajaxController extends Controller {

    public function getOneUser() {
        if(isset($_POST['id']) && !empty($_POST['id'])) {
            $id = addslashes($_POST['id']);

            $Usuario = new Usuario();
            $user = $Usuario->getOne($id);

            echo json_encode($user);
        }
    }

    public function updateUser() {
        if(isset($_POST["txt-nome"]) && !empty($_POST['txt-nome'])) {
            $nome = addslashes($_POST['txt-nome']);
            $email = addslashes($_POST['txt-email']);
            $senha = addslashes($_POST['txt-senha']);
            $id = addslashes($_POST['id']);

            $Usuario = new Usuario();
            $Usuario->update($id, $nome, $email, $senha);
        }

        echo json_encode(true);
    }

    public function deleteUser() {
        if(isset($_POST['id']) && !empty($_POST['id'])) {
            $id = addslashes($_POST['id']);

            $Usuario = new Usuario();
            $Usuario->delete($id);
        }

        echo json_encode(true);
    }

    public function addUser() {
        if(isset($_POST['txt-nome']) && !empty($_POST['txt-nome'])) {
            $nome = addslashes($_POST['txt-nome']);
            $email = addslashes($_POST['txt-email']);
            $senha = addslashes($_POST['txt-senha']);

            $Usuario = new Usuario();
            $Usuario->add($nome, $email, $senha);
        }

        echo json_encode(true);
    }

}

?>