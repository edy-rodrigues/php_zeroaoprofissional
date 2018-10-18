<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Photos;

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
                    $array['error'] = $Users->delete($id);
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

    public function feed() {
        $array = array(
            'error' => '',
            'logged' => false
        );

        $method = $this->getMethod();
        $data = $this->getRequestData();

        $Users = new Users();

        if(!empty($data['token']) && $Users->validateJWT($data['token'])) {
            $array['logged'] = true;

            if($method == 'GET') {

                $offset = 0;
                if(!empty($data['offset'])) {
                    $offset = intval($data['offset']);
                }

                $per_page = 10;
                if(!empty($data['per_page'])) {
                    $per_page = intval($data['per_page']);
                }

                $array['data'] = $Users->getFeed($offset, $per_page);

            } else {
                $array['error'] = 'Método '. $method .' não disponível';
            }

        } else {
            $array['error'] = 'Acesso negado';
        }

        $this->returnJSON($array);
    }

    public function photos($id_user) {
        $array = array(
            'error' => '',
            'logged' => false
        );

        $method = $this->getMethod();
        $data = $this->getRequestData();

        $Users = new Users();
        $Photos = new Photos();

        if(!empty($data['token']) && $Users->validateJWT($data['token'])) {
            $array['logged'] = true;

            $array['is_me'] = false;
            if($id_user == $Users->getId()) {
                $array['is_me'] = true;
            }

            if($method == 'GET') {

                $offset = 0;
                if(!empty($data['offset'])) {
                    $offset = intval($data['offset']);
                }

                $per_page = 10;
                if(!empty($data['per_page'])) {
                    $per_page = intval($data['per_page']);
                }

                $array['data'] = $Photos->getPhotosFromUser($id_user, $offset, $per_page);

            } else {
                $array['error'] = 'Método '. $method .' não disponível';
            }

        } else {
            $array['error'] = 'Acesso negado';
        }

        $this->returnJSON($array);
    }

    public function follow($id_user) {
        $array = array(
            'error' => '',
            'logged' => false
        );

        $method = $this->getMethod();
        $data = $this->getRequestData();

        $Users = new Users();
        $Photos = new Photos();

        if(!empty($data['token']) && $Users->validateJWT($data['token'])) {
            $array['logged'] = true;

            switch($method) {
                case 'POST':
                    $Users->follow($id_user);
                break;
                case 'DELETE':
                    $Users->unfollow($id_user);
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