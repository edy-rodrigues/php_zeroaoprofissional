<?php
namespace Controllers;

use \Core\Controller;
use \Models\Tarefa;

class TodoController extends Controller {

    public function index() {}

    public function listar() {
        $array = array();

        $Tarefa = new Tarefa();
        $array = $Tarefa->listar();

        header("Content-Type: application/json");
        echo json_encode($array);
    }

    public function add() {
        if(isset($_POST['txt-titulo']) && !empty($_POST['txt-titulo'])) {
            $titulo = addslashes($_POST['txt-titulo']);

            $Tarefa = new Tarefa();
            $Tarefa->addTarefa($titulo);
        }
    }
    
    public function del() {
        if(isset($_POST['id']) && !empty($_POST['id'])) {
            $id = addslashes($_POST['id']);

            $Tarefa = new Tarefa();
            $Tarefa->delTarefa($id);
        }
    }

    public function update() {
        if(isset($_POST['id']) && !empty($_POST['id'])) {
            $id = addslashes($_POST['id']);
            $status = addslashes($_POST['status']);

            $Tarefa = new Tarefa();
            $Tarefa->updateStatus($id, $status);
        }
    }

}
?>