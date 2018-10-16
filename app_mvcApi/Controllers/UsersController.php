<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;

class UsersController extends Controller {

    public function index() {}

    public function login() {
        $array = array(
            'error' => ''
        );

        $method = $this->getMethod();
        $data = $this->getRequestData();

        if($method == 'POST') {
            if(!empty($data['email']) && !empty($data['pass'])) {
                $Users = new Users();

                if($Users->checkCredentials($data['email'], $data['pass'])) {
                    $array['token'] = $Users->createJWT();
                } else {
                    $array['error'] = 'Acesso negado';
                }

            } else {
                $array['error'] = 'E-mail e/ou Senha não preenchido';
            }
        } else {
            $array['error'] = 'Método de requisição imcompatível';
        }

        $this->returnJSON($array);
    }

    public function new_record() {
        $array = array(
            'error' => ''
        );
        
        $method = $this->getMethod();
        $data = $this->getRequestData();

        if($method == 'POST') {
            if(!empty($data['name']) && !empty($data['email']) && !empty($data['pass'])) {
                if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $Users = new Users();
                    if($Users->create($data['name'], $data['email'], $data['pass'])) {
                        $array['token'] = $Users->createJWT();
                    } else {
                        $array['error'] = 'E-mail já existente';
                    }
                } else {
                    $array['error'] = 'E-mail inválido';
                }
            } else {
                $array['error'] = 'E-mail e/ou Senha não preenchido';
            }
        } else {
            $array['error'] = 'Método de requisição imcompatível';
        }

        $this->returnJSON($array);
    }

    public function view($id) {
        $array = array(
            'error' => '',
            'logged' => false
        );

        $method = $this->getMethod();
        $data = $this->getRequestData();

        $Users = new Users();

        if(!empty($data['token']) && $Users->validateJWT($data['token'])) {
            $array['logged'] = true;

            $array['is_me'] = false;
            if($id == $Users->getId()) {
                $array['is_me'] = true;
            }

            switch($method) {
                case 'GET':
                    $array['data'] = $Users->getInfo($id);
                    if(count($array['data']) === 0) {
                        $array['error'] = 'Usuário não existe';
                    }
                break;
                case 'PUT':
                    $array['error'] = $Users->editInfo($id, $data);
                break;
                case 'DELETE':
                break;
                default:
                    $array['error'] = 'Método '. $method .' não disponível';
                break;
            }

        } else {
            $array['error'] = 'Acesso negado';
        }

        $this->returnJSON($array);
    }
}

?>