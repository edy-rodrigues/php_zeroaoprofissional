<?php
class cadastrarController extends Controller {
    public function index() {
        $dados = [];
        $usuario = new Usuario();

        if(isset($_POST['txt-nome']) && empty($_POST['txt-nome'])) {
            $dados['txt_nome'] = false;
        } else if(isset($_POST['txt-nome']) && !empty($_POST['txt-nome'])) {
            $nome = addslashes($_POST['txt-nome']);
            $dados['txt_nome_tmp'] = $nome;
            $email = addslashes($_POST['txt-email']);
            $senha = $_POST['txt-senha'];
            $telefone = addslashes($_POST['txt-telefone']);

            if(!empty($nome) && !empty($email) && !empty($senha)) {
                $dados['campos_vazio'] = false;
                if($usuario->create($nome, $email, $senha, $telefone)) {
                    $dados['cadastrar_sucesso'] = true;
                }
            } else if(empty($email)) {
                $dados['txt_email'] = false;
            } else if(empty($senha)) {
                $dados['txt_senha'] = false;
            }
        }

        if(isset($_POST['txt-email']) && !empty($_POST['txt-email'])) {
            $dados['txt_email_tmp'] = $email;
        }
        if(isset($_POST['txt-senha']) && !empty($_POST['txt-senha'])) {
            $dados['txt_senha_tmp'] = $senha;
        }
        if(isset($_POST['txt-telefone']) && !empty($_POST['txt-telefone'])) {
            $dados['txt_telefone_tmp'] = $telefone;
        }

        $this->loadTemplate("cadastrar", $dados);
    }
}
?>