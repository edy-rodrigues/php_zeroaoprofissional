<?php
class HomeController extends Controller {

    public function index() {
        $dados = array();

        $this->loadTemplate("home", $dados);
    }

    public function verificaNotificacao() {
        $dados = array(
            "qtde_notificacao" => 0
        );

        $Notificacao = new Notificacao();
        $dados['qtde_notificacao'] = $Notificacao->getNotificationNoVisualized();

        echo json_encode($dados);
    }

    public function addNotificacao() {
        $dados = array();

        $Notificacao = new Notificacao();
        $Notificacao->add();
    }

}
?>