<?php

class loginController extends Controller {
    public function index() {
        $dados = [];
        $Usuario = new Usuario();
        
        if(isset($_POST['txt-email']) && empty($_POST['txt-email'])) {
            $dados['txt_email'] = false;
        } else {
            if(isset($_POST['txt-email']) && !empty($_POST['txt-email'])) {
                $email = addslashes($_POST['txt-email']);
                $dados['txt_email_tmp'] = $email;
                $senha = $_POST['txt-senha'];
                
                if(!empty($email) && !empty($senha)) {
                    $dados['campos_vazio'] = false;
                    if($Usuario->login($email, $senha)) {
                        header("Location: ". BASE_URL);
                    } else {
                        $dados['login_sucesso'] = false;
                    }
                } else if (empty($senha)) {
                    $dados['txt_senha'] = false;
                }
            }
        }

        if(isset($_POST['txt-senha']) && !empty($_POST['txt-senha'])) {
            $dados['txt_senha_tmp'] = $senha; 
        }

        $this->loadTemplate("login", $dados);
    }

    public function logout() {
        session_start();
        unset($_SESSION['cLogin']);
        header("Location: ./");
    }
}

?>