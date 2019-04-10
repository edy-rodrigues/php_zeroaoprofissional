<?php
namespace Controllers;

use \Core\Controller;
use \Models\User;

class LoginController extends Controller {

    public function index() {
        $data = array(
            "error" => array()
        );

        if(isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $pass = md5($_POST['pass']);

            if(!empty($email) && !empty($pass)) {
                $User = new User();

                $data['error']['login'] = $User->login($email, $pass);
            } else {
                $data['error']['login'] = "Usuário e/ou senha são obrigatórios!";
            }
        } elseif(isset($_POST['email']) && empty($_POST['email'])) {
            $data['error']['login'] = "Usuário e/ou senha são obrigatórios!";
        }

        $this->loadView('login', $data);
    }

    public function sign_in() {
        if(isset($_POST['name']) && !empty($_POST['name'])) {
            $user = array(
                "name" => addslashes($_POST['name']),
                "email" => addslashes($_POST['email']),
                "pass" => md5($_POST['pass']),
                "gender" => addslashes($_POST['gender']),
                "date_birthday" => addslashes($_POST['year-birthday']."-".$_POST['month-birthday']."-".$_POST['day-birthday'])
            );

            $User = new User();
            $dados['error'] = $User->sign_in($user);
        }
    }

    public function logout() {
        unset($_SESSION['fbLogin']);
        header("Location: ". BASE_URL. "login");
        exit;
    }

}
?>