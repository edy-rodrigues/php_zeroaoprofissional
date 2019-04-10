<?php
namespace Controllers;

use \Core\Controller;
use \Models\User;

class ProfileController extends Controller {

    public function __construct() {
        $User = new User();
        if(!$User->isLogged()) {
            header("Location: ". BASE_URL ."login");
            exit;
        }
    }

    public function index() {
        $data = array(
            'user' => array(
                'name' => ''
            )
        );

        $User = new User();
        
        $data['user'] = $User->getInfo($_SESSION['fbLogin']);

        $this->loadTemplate('profile', $data);
    }

}
?>