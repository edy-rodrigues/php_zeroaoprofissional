<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Photos;

class PhotosController extends Controller {

    public function index() {}

    public function random() {
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

            if($method == 'GET') {

                $per_page = 10;
                if(!empty($data['per_page'])) {
                    $per_page = intval($data['per_page']);
                }

                $excludes = array();
                if(!empty($data['excludes'])) {
                    $excludes = explode(",", $data['excludes']);
                }

                $array['data'] = $Photos->getRandomPhotos($per_page, $excludes);

            } else {
                $array['error'] = 'Método '. $method .' não disponível';
            }

        } else {
            $array['error'] = 'Acesso negado';
        }

        $this->returnJSON($array);
    }

    public function view($id_photo) {
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
                case 'GET':
                    $array['data'] = $Photos->getPhoto($id_photo);
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