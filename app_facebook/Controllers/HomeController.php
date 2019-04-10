<?php
namespace Controllers;

use \Core\Controller;
use \Models\User;

class HomeController extends Controller {

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

        $this->loadTemplate('home', $data);
    }

}
?>