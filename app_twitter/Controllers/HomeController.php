<?php
namespace Controllers;

use \Core\Controller;
use \Models\User;

class HomeController extends Controller {

    public function __construct() {
        $User = new User();

        if(!$User->isLogged()) {
            header("Location: ". BASE_URL .'login');
        }
    }

    public function index() {
        $data = array();
        
        $this->loadTemplate('home', $data);
    }

}
?>