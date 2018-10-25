<?php
namespace Controllers;

use \Core\Controller;
use \Models\User;

class LoginController extends Controller {

    public function index() {
        $data = array();

        if(isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $pass = md5($_POST['pass']);

            $User = new User();

            if($User->login($email, $pass)) {
                header("Location: ". BASE_URL);
            }
        }

        $this->loadView('login', $data);
    }

    public function sign_in() {
        $data = array(
            'alert' => ''
        );

        if(isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $email = addslashes($_POST['email']);
            $pass = md5($_POST['pass']);

            $User = new User();
            
            if(!empty($name) && !empty($email) && !empty($pass)) {
                if(!$User->emailExists($email)) {
                    $User->newUser($name, $email, $pass);
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

    public function logout() {
        unset($_SESSION['twLogin']);
        header("Location: ". BASE_URL .'login');
    }

}
?>