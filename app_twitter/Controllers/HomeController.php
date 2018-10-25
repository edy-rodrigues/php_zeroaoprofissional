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
        $data = array(
            'name' => '',
            'script' => ''
        );

        if(isset($_SESSION['script']) && !empty($_SESSION['script'])) {
            $data['script'] = $_SESSION['script'];
            unset($_SESSION['script']);
        }

        $User = new User($_SESSION['twLogin']);

        $data['name'] = $User->getName();
        $data['qt_followed'] = $User->countFollowed();
        $data['qt_following'] = $User->countFollowing();
        $data['user_suggestion'] = $User->getUsers(5);
        
        $this->loadTemplate('home', $data);
    }

}
?>