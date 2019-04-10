<?php
class HomeController extends Controller {

    public function index() {
        $dados = array();

        $Modulo = new Modulo();
        $dados['modulos'] = $Modulo->getList();

        $this->loadTemplate('home', $dados);
    }

    public function pegarAulas() {
        if(isset($_POST['modulo'])) {
            $id_modulo = $_POST['modulo'];

            $Aula = new Aula();
            $aulas = $Aula->getList($id_modulo);

            echo json_encode($aulas);
        }
    }

}
?>