<?php
namespace Controllers;

use \Core\Controller;

class ContatoController extends Controller {

    public function index() {
        $data = array(
            'aviso' => ''
        );

        if(isset($_POST['nome']) && !empty($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $mensagem = addslashes($_POST['mensagem']);

            $para = 'edineibk@gmail.com';
            $assunto = 'Dúvida do site';
            $mensagem = 'Nome: '. $nome. '<br>E-mail: '. $email. '<br>Mensagem: '. $mensagem;
            $cabecalho = 'From: edineibk@gmail.com\r\n Reply-To:'. $email .'\r\n'. 'X-Mailer: PHP/'. phpversion();
            // mail($para, $assunto, $mensagem, $cabecalho);

            $data['aviso'] = '<strong>E-mail enviado com sucesso!</strong>';
        }

        $this->loadTemplate('contato', $data);
    }

}
?>