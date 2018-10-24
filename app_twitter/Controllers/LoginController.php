<?php
namespace Controllers;

use \Core\Controller;
use \Models\User;

class LoginController extends Controller {

    public function index() {
        $data = array();



        $this->loadView('login', $data);
    }

    public function sign_in() {
        $data = array(
            'alert' => ''
        );

        $User = new User();

        if(isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $email = addslashes($_POST['email']);
            $senha = md5($_POST['pass']);
            if(!empty($name) && !empty($email) && !empty($pass)) {
                if(!$User->emailExists($email)) {
                    $User->createUser($nome, $email, $pass);
                    header("Location: ". BASE_URL);
                } else {
                    $data['alert'] = 'Este usuário já existe!';
                }
            } else {
                $data['alert'] = 'Preencha todos os campos!';
            }
        }

        $this->loadView('cadastro', $data);
    }

}
?>